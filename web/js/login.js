document.addEventListener('DOMContentLoaded', function() {
    // Password toggle functionality
    const passwordToggle = document.querySelector('.password-toggle');
    const passwordInput = document.getElementById('password-input');
    const icon = document.getElementById('password-toggle-icon');

    if (passwordToggle) {
        passwordToggle.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    }

    // Remember me functionality
    const rememberCheckbox = document.querySelector('.custom-checkbox');
    const usernameInput = document.querySelector('[name="LoginForm[username]"]');
    
    if (rememberCheckbox && usernameInput) {
        const savedUsername = localStorage.getItem('remembered_username');
        if (savedUsername) {
            usernameInput.value = savedUsername;
            rememberCheckbox.checked = true;
        }
        
        document.getElementById('login-form')?.addEventListener('submit', function() {
            if (rememberCheckbox.checked) {
                localStorage.setItem('remembered_username', usernameInput.value);
            } else {
                localStorage.removeItem('remembered_username');
            }
        });
    }
});