document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', (e) => {
        const inputs = form.querySelectorAll('input');
        let isValid = true;
        inputs.forEach(input => {
            if (!input.value.trim()) {
                alert(`Field ${input.placeholder} tidak boleh kosong!`);
                isValid = false;
            }
        });
        if (!isValid) e.preventDefault();
    });
});

// document.querySelectorAll('.toggle-password').forEach(button => {
//     button.addEventListener('click', () => {
//         const input = button.previousElementSibling; // Ambil elemen input sebelumnya
//         const icon = button.querySelector('i');
//         if (input.type === 'password') {
//             input.type = 'text';
//             icon.classList.remove('fa-eye');
//             icon.classList.add('fa-eye-slash');
//         } else {
//             input.type = 'password';
//             icon.classList.remove('fa-eye-slash');
//             icon.classList.add('fa-eye');
//         }
//     });
// });



document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', (e) => {
        const username = form.querySelector('input[name="register_name"]');
        const password = form.querySelector('input[name="register_password"]');
        
        const specialCharRegex = /[^a-zA-Z0-9]/;
        if (username && specialCharRegex.test(username.value)) {
            alert('Username tidak boleh mengandung karakter khusus.');
            e.preventDefault();
        }
        if (password && !specialCharRegex.test(password.value)) {
            alert('Password harus mengandung setidaknya satu karakter khusus.');
            e.preventDefault();
        }
    });
});

