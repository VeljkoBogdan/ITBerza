"use strict";
const loginPage = "/ITBerza/login.php";
const signUpPage = "/ITBerza/sign-up.php";

// Login form
let loginForm = document.getElementById('loginForm');
// Signup form
let signUpForm = document.getElementById('signUpForm');

loginForm.addEventListener('submit', function(event) {

    if (validateForm("login")) {
        console.log('Form is valid. Submitting...');
    } else {
        console.log('Form is invalid. Please check your inputs.');
        event.preventDefault();
    }
});
// Signup check script
signUpForm.addEventListener('submit', function(event) {
    if (validateForm("signup")) {
        console.log('Form is valid. Submitting...');
    } else {
        console.log('Form is invalid. Please check your inputs.');
        event.preventDefault();
    }
});

window.onload = function() {
    // Company checkbox
    let checkbox = document.getElementById('company-check-box');
    let companyInputs = document.getElementById('company-input');

    // Company checkbox reset
    companyInputs.style.display = 'none';
    // Company checkbox listener
    checkbox.addEventListener('change', function() {
            // If the checkbox is checked, show the additional form inputs
            if (checkbox.checked) {
                companyInputs.style.display = 'block';
            } else {
                // Otherwise, hide the additional form inputs
                companyInputs.style.display = 'none';
            }
        });
    // Login check script
}

// Form validation function
function validateForm(type) {
    let isValid = true;
    if(type === "login"){
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        //validate
        if(!validateEmail(email) || email===""){
            isValid = false;
        }
        if(password==="" || password.length < 8){
            isValid = false;
        }
    }
    else{
        let firstName = document.getElementById('firstName').value;
        let lastName = document.getElementById('lastName').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let confirmPassword = document.getElementById('confirm-password').value;
        let telephone = document.getElementById('telephone').value;

        //validate
        if(firstName===""){
            isValid = false;
        }
        if(lastName===""){
            isValid = false;
        }
        if(!validateEmail(email) === false || email === ""){
            isValid = false;
        }
        if(!validatePassword(password) === false || password === ""){
            isValid = false;
        }
        if(confirmPassword !== password){
            isValid = false;
        }
        if(!validatePhone(telephone) === false || telephone === ""){
            isValid = false;
        }
    }
    return isValid;
}

// Login and Signup password visibility toggler
function togglePasswordVisibilitySignUp(){
    let passwordInput = document.getElementById('password');
    let confirmPasswordInput = document.getElementById('confirm-password');
    let toggleButton = document.getElementById('toggle-button');
    let toggleButtonConfirm = document.getElementById('toggle-button-confirm');
    // If the password is visible
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        confirmPasswordInput.type = 'text';
        toggleButton.textContent = 'Hide';
        toggleButtonConfirm.textContent = 'Hide';
    } else {
        // If the password is invisible
        passwordInput.type = 'password';
        confirmPasswordInput.type = 'password';
        toggleButton.textContent = 'Show';
        toggleButtonConfirm.textContent = 'Show';
    }
}
function togglePasswordVisibilityLogin(){
    let passwordInput = document.getElementById('password');
    let toggleButton = document.getElementById('toggle-button');
    // If the password is visible
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.textContent = 'Hide';
    } else {
        // If the password is invisible
        passwordInput.type = 'password';
        toggleButton.textContent = 'Show';
    }
}
function validateEmail(email) {
    let re = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(email);
}
function validatePassword(pass){
    let re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return re.test(pass);
}
function validatePhone(phone){
    let re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    return re.test(phone);
}