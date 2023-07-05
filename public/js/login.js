document.addEventListener('DOMContentLoaded', function() {
    var registerForm = document.getElementById('register-form');
    var loginForm = document.getElementById('login-form');
    var registerToggle = document.getElementById('register');
    var loginToggle = document.getElementById('login');

    registerToggle.addEventListener('click', function() {
        registerForm.classList.add('visible');
        loginForm.classList.remove('visible');
    });

    loginToggle.addEventListener('click', function() {
        registerForm.classList.remove('visible');
        loginForm.classList.add('visible');
    });
});
