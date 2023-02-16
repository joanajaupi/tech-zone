const error = document.getElementById("errorDiv");
function validateForm(){
    // check if password and confirm password match
   
    if (document.getElementById("password").value != document.getElementById("confirm-password").value) {
        error.innerHTML = "Password and Confirm Password do not match";
        document.getElementById("password").value = "";
        document.getElementById("confirm-password").value = "";
        document.getElementById("password").focus();
        document.getElementById("password").select();
        return false;
    }
    // check if password is at least 8 characters long
    if (document.getElementById("password").value.length < 8) {
        error.innerHTML = "Password must be at least 8 characters long";
        document.getElementById("password").value = "";
        document.getElementById("confirm-password").value = "";
        document.getElementById("password").focus();
        document.getElementById("password").select();

        return false;
    }
    if(!validatePass(document.getElementById("password").value)){
        error.innerHTML = "Password must contain at least one number, one lowercase and one uppercase letter";
        document.getElementById("password").value = "";
        document.getElementById("confirm-password").value = "";
        document.getElementById("password").focus();
        document.getElementById("password").select();

        return false;
    }
    // check if email is valid
    if (!validateEmail(document.getElementById("email").value)) {
        error.innerHTML = "Email is not valid";
        document.getElementById("email").value = "";
        document.getElementById("email").focus();
        document.getElementById("email").select();
        return false;
    }
    if(!validatePhone(document.getElementById("phone").value)){
        error.innerHTML = "Phone number is not valid";
        document.getElementById("phone").value = "";
        document.getElementById("phone").focus();
        document.getElementById("phone").select();
        return false;
    }
    return true;
}
function validateEmail(email) {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
}
function validatePass(password) {
    const re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return re.test(password);
}

function validatePhone(phone) {
    const re = /^\d{10}$/;
    return re.test(phone);
}
