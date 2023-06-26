"use strict";
const loginPage = "/ITBerza/login.php";
const signUpPage = "/ITBerza/sign-up.php";

/*
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
*/

window.onload = function() {
    // Extract the base page name from the URL
    let urlParts = window.location.pathname.split('/');
    let pageName = urlParts[urlParts.length - 1].split('?')[0]; // Remove GET variables

    // Check if the current page is "sign-up.php"
    if (pageName === "sign-up.php") {
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
    }
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
        let firstName = document.getElementById('first-name').value;
        let lastName = document.getElementById('last-name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let confirmPassword = document.getElementById('confirm-password').value;
        let telephone = document.getElementById('telephone').value;

        if(document.getElementById('company-check-box').checked){
            let companyName = document.getElementById('company-name').value;
            let website = document.getElementById('website').value;
            let address = document.getElementById('address').value;
            let description = document.getElementById('description').value;

            if(companyName===""){
                isValid = false;
                document.getElementById('company-name-error').innerHTML = "Enter a company name!";
            }
            if(website===""){
                isValid = false;
                document.getElementById('company-website-error').innerHTML = "Enter a valid company website!";
            }
            if(address===""){
                isValid = false;
                document.getElementById('company-address-error').innerHTML = "Enter a company address!";
            }
        }
        //validate
        if(firstName===""){
            isValid = false;
            document.getElementById('first-name-error').innerHTML = "Please enter your first name!";
        }
        if(lastName===""){
            isValid = false;
            document.getElementById('last-name-error').innerHTML = "Please enter your last name!";
        }
        if(validateEmail(email) === false || email === ""){
            isValid = false;
            document.getElementById('email-error').innerHTML = "Please enter a correct email address!";
        }
        if(validatePassword(password) === false || password === ""){
            isValid = false;
            document.getElementById('password-error').innerHTML = "Password must be 8 characters long and have a number and a special character!";
        }
        if(confirmPassword !== password){
            isValid = false;
            document.getElementById('confirm-password-error').innerHTML = "Passwords don't match!";
        }
        if(validatePhone(telephone) === false || telephone === ""){
            isValid = false;
            document.getElementById('telephone-error').innerHTML = "Please format your telephone number correctly!";
        }
    }
    return isValid;
}
// Job form validation function
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
// Password recovery form validation function
function validatePasswordRecovery() {
    let isValid = true;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirm-password").value;

    if(validatePassword(password) === false){
        isValid = false;
        document.getElementById('password-error').innerHTML = "The password must have 8 characters, at least one number, uppercase letter and special character!";
    }
    if(confirmPassword !== password){
        isValid = false;
        document.getElementById('password-confirmation-error').innerHTML = "Passwords don't match!";
    }
    return isValid;
}
// Email for recovery validation function
function validatePasswordRecoveryEmail() {
    let isValid = true;
    let forgottenEmail = document.getElementById('forgot-password-email').value.trim();

    if(validateEmail(forgottenEmail) === false){
        isValid = false;
    }
    alert(isValid);
    return isValid;
}
// Change user password validation function
function validatePasswordChange() {
    let isValid = true;
    let password = document.getElementById("password").value;
    let newPassword = document.getElementById('new-password').value;
    let confirmPassword = document.getElementById("confirm-password").value;

    if(validatePassword(password) === false || password===""){
        isValid = false;
        document.getElementById('password-error').innerHTML = "The password must have 8 characters, at least one number, uppercase letter and special character!";
    }
    if(validatePassword(newPassword) === false || newPassword===""){
        isValid = false;
        document.getElementById('new-password-error').innerHTML = "The password must have 8 characters, at least one number, uppercase letter and special character!";
    }
    if(confirmPassword !== newPassword || confirmPassword===""){
        isValid = false;
        document.getElementById('confirm-password-error').innerHTML = "Passwords don't match!";
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
function togglePasswordVisibilityNew(){
    let newPassword = document.getElementById('new-password');
    let confirmPasswordInput = document.getElementById('confirm-password');
    let toggleButtonNew = document.getElementById('toggle-button-new');
    let toggleButtonConfirm = document.getElementById('toggle-button-confirm');
    // If the password is visible
    if (newPassword.type === 'password') {
        newPassword.type = 'text';
        confirmPasswordInput.type = 'text';
        toggleButtonNew.textContent = 'Hide';
        toggleButtonConfirm.textContent = 'Hide';
    } else {
        // If the password is invisible
        newPassword.type = 'password';
        confirmPasswordInput.type = 'password';
        toggleButtonNew.textContent = 'Show';
        toggleButtonConfirm.textContent = 'Show';
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