window.onload = function() {
    //company checkbox
    var checkbox = document.getElementById('company-check-box');
    var companyInputs = document.getElementById('company-input');

    // Hide the additional form inputs initially
    companyInputs.style.display = 'none';

    // Add an event listener to the checkbox
    checkbox.addEventListener('change', function() {
        // If the checkbox is checked, show the additional form inputs
        if (checkbox.checked) {
            companyInputs.style.display = 'block';
        } else {
            // Otherwise, hide the additional form inputs
            companyInputs.style.display = 'none';
        }
    });
};

function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var toggleButton = document.getElementById('toggle-button');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.textContent = 'Hide';
    } else {
        passwordInput.type = 'password';
        toggleButton.textContent = 'Show';
    }
}