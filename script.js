"use strict";
const loginPage = "/ITBerza/login.php";
const signUpPage = "/ITBerza/sign-up.php";

// Login form
let loginForm = document.getElementById('loginForm');
// Signup form
let signUpForm = document.getElementById('signUpForm');

// Login check script
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
    if(type === 'login'){
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        //validate
        if(validateEmail(email) === false || email===""){
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
            document.getElementById('firstNameError').innerHTML = "Please enter your first name!";
        }
        if(lastName===""){
            isValid = false;
            document.getElementById('lastNameError').innerHTML = "Please enter your last name!";
        }
        if(validateEmail(email) === false || email === ""){
            isValid = false;
            document.getElementById('emailError').innerHTML = "Please enter a correct email address!";
        }
        if(validatePassword(password) === false || password === ""){
            isValid = false;
            document.getElementById('passwordError').innerHTML = "Password must be 8 characters long and have a number and a special character!";
        }
        if(confirmPassword !== password){
            isValid = false;
            document.getElementById('confirmPasswordError').innerHTML = "Passwords don't match!";
        }
        if(validatePhone(telephone) === false || telephone === ""){
            isValid = false;
            document.getElementById('telephoneError').innerHTML = "Please format your telephone number correctly!";
        }
    }
    return isValid;
}
function validateJobForm() {
    let isValid = true;
    let contactPerson = document.getElementById('contact_name').value;
    let contactEmail = document.getElementById('contact_email').value;
    let contactPhone = document.getElementById('contact_phone').value;
    let companyName = document.getElementById('company_name').value;
    let taxNumber = document.getElementById('pib').value;
    let positionName = document.getElementById('position_name').value;
    let category = document.getElementById('categories').value;
    let city = document.getElementById('locations').value;
    let isRemote = false;
    if(document.getElementById('remoteWork').checked === true){
        isRemote=true;
    }
    let qualifications = document.getElementById('professional_qualification').value;
    let employmentType = document.getElementById('employment_type').value;
    let text = document.getElementById('text').value;
    let signupEmail = document.getElementById('email_input_form').value;
    let signupPhone = document.getElementById('phone_input_form').value;
    let duration = document.getElementById('ad_period').value;
    let signupPeriodFrom = document.getElementById('visible_from').value;
    let signupPeriodTo = document.getElementById('visible_to').value;

    if(contactPerson==="" || contactPerson.length <= 1){
        isValid=false;
        document.getElementById('contact_person_error').innerHTML="Error";
    }
    if(contactEmail==="" || validateEmail(contactEmail)===false){
        isValid=false;
        document.getElementById('contact_email_error').innerHTML="Error";
    }
    if(contactPhone==="" || validatePhone(contactPhone)===false){
        isValid=false;
        document.getElementById('contact_phone_error').innerHTML="Error";
    }
    if(companyName==="" || companyName.length <= 1){
        isValid=false;
        document.getElementById('company_name_error').innerHTML="Error";
    }
    if(taxNumber==="" || taxNumber < 10000001 || taxNumber > 99999999 || taxNumber.isNumeric()===false){
        isValid=false;
        document.getElementById('pib_error').innerHTML="Error";
    }
    if(positionName==="" || positionName===0){
        isValid=false;
        document.getElementById('position_error').innerHTML="Error";
    }
    if(category==="" || category===0){
        isValid=false;
        document.getElementById('category_error').innerHTML="Error";
    }
    if(city==="" || city===0){
        isValid=false;
        document.getElementById('city_error').innerHTML="Error";
    }
    if(qualifications===0 || qualifications===""){
        isValid=false;
        document.getElementById('qualification_error').innerHTML="Error";
    }
    if(employmentType===0 || employmentType===""){
        isValid=false;
        document.getElementById('employment_error').innerHTML="Error";
    }
    if(text==="" || text.length < 30){
        isValid=false;
        document.getElementById('text_error').innerHTML="Error";
    }
    if(signupEmail==="" || validateEmail(signupEmail)===false){
        isValid=false;
        document.getElementById('application_email_error').innerHTML="Error";
    }
    if(signupPhone==="" || validatePhone(signupPhone)===false){
        isValid=false;
        document.getElementById('application_phone_error').innerHTML="Error";
    }
    if(duration===""){
        isValid=false;
        document.getElementById('duration_error').innerHTML="Error";
    }
    if(signupPeriodFrom===""){
        isValid=false;
        document.getElementById('period_error').innerHTML="Error";
    }
    if(signupPeriodTo===""){
        isValid=false;
        document.getElementById('period_error').innerHTML="Error";
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
// Regex Validators
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