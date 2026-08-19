document.addEventListener('DOMContentLoaded', () => {

    const loginForm = document.getElementById('loginForm');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');

    const togglePassword = document.getElementById('togglePassword');

    const loginButton = document.getElementById('loginButton');

    const loginAlert = document.getElementById('loginAlert');


    /*
    |--------------------------------------------------------------------------
    | Show / Hide Password
    |--------------------------------------------------------------------------
    */

    if (togglePassword) {

        togglePassword.addEventListener('click', () => {

            const isPassword =
                passwordInput.type === 'password';

            passwordInput.type =
                isPassword ? 'text' : 'password';


            const icon =
                togglePassword.querySelector('i');

            if (isPassword) {

                icon.classList.remove('bi-eye');

                icon.classList.add('bi-eye-slash');

                togglePassword.setAttribute(
                    'aria-label',
                    'Sembunyikan password'
                );

            } else {

                icon.classList.remove('bi-eye-slash');

                icon.classList.add('bi-eye');

                togglePassword.setAttribute(
                    'aria-label',
                    'Tampilkan password'
                );
            }

        });
    }


    /*
    |--------------------------------------------------------------------------
    | Clear Alert
    |--------------------------------------------------------------------------
    */

    function clearAlert() {

        loginAlert.classList.remove(
            'show',
            'success',
            'error'
        );

        loginAlert.textContent = '';
    }


    /*
    |--------------------------------------------------------------------------
    | Show Alert
    |--------------------------------------------------------------------------
    */

    function showAlert(message, type = 'error') {

        loginAlert.textContent = message;

        loginAlert.classList.remove(
            'success',
            'error'
        );

        loginAlert.classList.add(
            'show',
            type
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Set Loading State
    |--------------------------------------------------------------------------
    */

    function setLoading(loading) {

        if (loading) {

            loginButton.classList.add('loading');

            loginButton.disabled = true;

        } else {

            loginButton.classList.remove('loading');

            loginButton.disabled = false;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Login Submit
    |--------------------------------------------------------------------------
    */

    if (loginForm) {

        loginForm.addEventListener('submit', async (event) => {

            event.preventDefault();

            clearAlert();


            const username =
                usernameInput.value.trim();

            const password =
                passwordInput.value;


            /*
            |--------------------------------------------------------------------------
            | Client Validation
            |--------------------------------------------------------------------------
            */

            if (!username) {

                showAlert(
                    'Username wajib diisi.'
                );

                usernameInput.focus();

                return;
            }


            if (!password) {

                showAlert(
                    'Password wajib diisi.'
                );

                passwordInput.focus();

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | Loading
            |--------------------------------------------------------------------------
            */

            setLoading(true);


            try {

                const formData =
                    new FormData(loginForm);

                // formData sudah otomatis membawa field "_token" dari @csrf di blade,
                // jadi tidak perlu header CSRF terpisah.

                const response =
                    await fetch(loginForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    });


                const result =
                    await response.json();


                if (result.success) {

                    showAlert(
                        result.message || 'Login berhasil.',
                        'success'
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | Redirect
                    |--------------------------------------------------------------------------
                    */

                    setTimeout(() => {

                        window.location.href =
                            result.redirect || '/dashboard';

                    }, 500);


                } else {

                    showAlert(
                        result.message ||
                        'Username atau password salah.'
                    );

                    setLoading(false);

                    passwordInput.value = '';

                    passwordInput.focus();
                }


            } catch (error) {

                console.error(error);

                showAlert(
                    'Tidak dapat terhubung ke server. Silakan coba lagi.'
                );

                setLoading(false);
            }

        });
    }


    /*
    |--------------------------------------------------------------------------
    | Remove Error When User Starts Typing
    |--------------------------------------------------------------------------
    */

    [usernameInput, passwordInput].forEach(input => {

        if (!input) {
            return;
        }

        input.addEventListener('input', () => {

            if (loginAlert.classList.contains('show')) {
                clearAlert();
            }

        });

    });

});
