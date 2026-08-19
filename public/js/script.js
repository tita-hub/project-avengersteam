document.addEventListener('DOMContentLoaded', function() {

    const form = document.getElementById('loginForm');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const toggleBtn = document.getElementById('togglePassword');
    const loginBtn = document.getElementById('loginButton');
    const alertBox = document.getElementById('loginAlert');

    // --- Toggle Password ---
    toggleBtn.addEventListener('click', function() {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        const icon = this.querySelector('i');
        icon.className = type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
        this.setAttribute('aria-label', type === 'password' ? 'Tampilkan password' : 'Sembunyikan password');
    });

    // --- Hide error on input ---
    username.addEventListener('input', hideError);
    password.addEventListener('input', hideError);

    function hideError() {
        alertBox.classList.remove('show');
        username.classList.remove('error');
        password.classList.remove('error');
        alertBox.innerHTML = '';
    }

    // --- Submit form via AJAX ---
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        hideError();

        const user = username.value.trim();
        const pass = password.value.trim();

        if (user === '') {
            showError('Username tidak boleh kosong.');
            username.classList.add('error');
            username.focus();
            return;
        }

        if (pass === '') {
            showError('Password tidak boleh kosong.');
            password.classList.add('error');
            password.focus();
            return;
        }

        // --- Loading state ---
        loginBtn.classList.add('loading');
        loginBtn.disabled = true;

        // Ambil CSRF token
        const csrf = document.querySelector('input[name="csrf_token"]').value;

        // Kirim data
        const formData = new FormData();
        formData.append('username', user);
        formData.append('password', pass);
        formData.append('csrf_token', csrf);
        formData.append('action', 'login');

        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            loginBtn.classList.remove('loading');
            loginBtn.disabled = false;

            if (data.success) {
                window.location.href = 'dashboard.php';
            } else {
                showError(data.message || 'Username atau password salah.');
                username.classList.add('error');
                password.classList.add('error');
            }
        })
        .catch(error => {
            loginBtn.classList.remove('loading');
            loginBtn.disabled = false;
            console.error('Error:', error);
            showError('Terjadi kesalahan sistem. Silakan coba lagi.');
        });
    });

    // --- Helper show error ---
    function showError(msg) {
        alertBox.innerHTML = `<i class="bi bi-exclamation-circle"></i> ${msg}`;
        alertBox.classList.add('show');
        // Re-trigger animation
        alertBox.style.animation = 'none';
        void alertBox.offsetHeight;
        alertBox.style.animation = 'shakeError 0.45s ease';
    }

    // --- Auto focus ---
    if (username.value === '') {
        username.focus();
    }

    // --- Enter key pada password langsung submit ---
    password.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            form.dispatchEvent(new Event('submit'));
        }
    });

});