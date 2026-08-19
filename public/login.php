<?php

declare(strict_types=1);

session_set_cookie_params([
    'httponly' => true,
    'secure'   => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    'samesite' => 'Lax'
]);

session_start();

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/config/database.php';


/*
|--------------------------------------------------------------------------
| Only POST Request
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    http_response_code(405);

    echo json_encode([
        'success' => false,
        'message' => 'Method request tidak diperbolehkan.'
    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| Get Request Data
|--------------------------------------------------------------------------
*/

$username = trim(
    (string) ($_POST['username'] ?? '')
);

$password = (string) ($_POST['password'] ?? '');

$csrfToken = (string) ($_POST['csrf_token'] ?? '');


/*
|--------------------------------------------------------------------------
| CSRF Validation
|--------------------------------------------------------------------------
*/

if (
    empty($_SESSION['csrf_token']) ||
    empty($csrfToken) ||
    !hash_equals($_SESSION['csrf_token'], $csrfToken)
) {

    http_response_code(403);

    echo json_encode([
        'success' => false,
        'message' => 'Permintaan tidak valid. Silakan refresh halaman.'
    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| Input Validation
|--------------------------------------------------------------------------
*/

if ($username === '') {

    echo json_encode([
        'success' => false,
        'message' => 'Username wajib diisi.'
    ]);

    exit;
}

if ($password === '') {

    echo json_encode([
        'success' => false,
        'message' => 'Password wajib diisi.'
    ]);

    exit;
}


/*
|--------------------------------------------------------------------------
| Find User
|--------------------------------------------------------------------------
*/

try {

    $sql = "
        SELECT
            id,
            username,
            password,
            nama,
            role
        FROM users
        WHERE username = :username
        LIMIT 1
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':username' => $username
    ]);

    $user = $stmt->fetch();


    /*
    |--------------------------------------------------------------------------
    | Password Verification
    |--------------------------------------------------------------------------
    */

    if (
        !$user ||
        !password_verify($password, $user['password'])
    ) {

        http_response_code(401);

        echo json_encode([
            'success' => false,
            'message' => 'Username atau password salah.'
        ]);

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | Regenerate Session ID
    |--------------------------------------------------------------------------
    */

    session_regenerate_id(true);


    /*
    |--------------------------------------------------------------------------
    | Store User Session
    |--------------------------------------------------------------------------
    */

    $_SESSION['user_id'] = (int) $user['id'];

    $_SESSION['username'] = $user['username'];

    $_SESSION['nama'] = $user['nama'];

    $_SESSION['role'] = $user['role'];

    $_SESSION['login_time'] = time();


    /*
    |--------------------------------------------------------------------------
    | Regenerate CSRF Token
    |--------------------------------------------------------------------------
    */

    $_SESSION['csrf_token'] = bin2hex(
        random_bytes(32)
    );


    /*
    |--------------------------------------------------------------------------
    | Success Response
    |--------------------------------------------------------------------------
    */

    echo json_encode([
        'success' => true,
        'message' => 'Login berhasil.',
        'redirect' => 'dashboard.php'
    ]);

    exit;


} catch (PDOException $e) {

    error_log(
        'Login database error: ' . $e->getMessage()
    );

    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'Terjadi kesalahan pada server.'
    ]);

    exit;
}