<?php

declare(strict_types=1);

session_set_cookie_params([
    'httponly' => true,
    'secure'   => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    'samesite' => 'Lax'
]);

session_start();


/*
|--------------------------------------------------------------------------
| Destroy Session
|--------------------------------------------------------------------------
*/

$_SESSION = [];


/*
|--------------------------------------------------------------------------
| Delete Session Cookie
|--------------------------------------------------------------------------
*/

if (ini_get('session.use_cookies')) {

    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}


/*
|--------------------------------------------------------------------------
| Destroy Session
|--------------------------------------------------------------------------
*/

session_destroy();


/*
|--------------------------------------------------------------------------
| Redirect
|--------------------------------------------------------------------------
*/

header('Location: index.php');
exit;