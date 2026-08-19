<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login.
     * Middleware 'guest' di routes/web.php sudah otomatis meng-handle
     * redirect ke dashboard kalau user sudah login (pengganti blok
     * if (isset($_SESSION['user_id'])) { header('Location: dashboard.php'); }).
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login (dipanggil via fetch() dari script.js).
     * CSRF sudah otomatis divalidasi oleh middleware VerifyCsrfToken
     * bawaan Laravel selama form menyertakan @csrf.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:100',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        $credentials = $request->only('username', 'password');

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Username atau password salah.',
            ], 401);
        }

        // Regenerate session id, setara session_regenerate_id(true) di kode lama.
        $request->session()->regenerate();

        return response()->json([
            'success'  => true,
            'message'  => 'Login berhasil.',
            'redirect' => route('dashboard'),
        ]);
    }

    /**
     * Logout (pengganti logout.php).
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
