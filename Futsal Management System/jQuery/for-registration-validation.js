function validation(){
    fullName=document.getElementById('full-name').value.trim();
    phoneNumber=document.getElementById('phone-number').value.trim();
    age=document.getElementById('age').value.trim();
    address=document.getElementById('address').value.trim();
    email=document.getElementById('email').value.trim();
    username=document.getElementById('username').value.trim();
    password=document.getElementById('password').value;
    reEnteredPassword=document.getElementById('re-entered-password').value;

    // for error messages
    errorFullName=document.getElementById('full-name-validation');
    errorPhoneNumber=document.getElementById('phone-number-validation')
    errorAge=document.getElementById('age-validation');
    errorAddress=document.getElementById('address-validation');
    errorEmail=document.getElementById('email-validation');
    errorUsername=document.getElementById('username-validation');
    errorPassword=document.getElementById('password-validation');
    errorReEnteredPassword=document.getElementById('re-entered-password-validation');
    isValidated=true;
    console.log(fullName);
    if(fullName==''){
        errorFullName.innerHTML='&#xf071; Full Name empty'
        errorFullName.style.display="block";
        document.getElementById('full-name').focus();
        isValidated=false;
    }
    else{
        errorFullName.style.display="none";
        
    }
    if(phoneNumber==''){
        errorPhoneNumber.innerHTML='&#xf071; Phone Number empty'
        errorPhoneNumber.style.display="block";
        document.getElementById('phone-number').focus();
        isValidated=false;

    }
    else{
        errorPhoneNumber.style.display="none";
    }
    if(age==''){
        errorAge.innerHTML='&#xf071; age empty';
        errorAge.style.display="block";
        document.getElementById('age').focus();
        isValidated=false;

    }
    else{
        errorAge.style.display="none";

    }
    if(address==''){
        errorAddress.innerHTML='&#xf071; address empty';
        errorAddress.style.display="block";
        document.getElementById('address').focus();
        isValidated=false;

    }
    else{
        errorAddress.style.display="none";

    }
    if(email==''){
        errorEmail.innerHTML='&#xf071; email empty';
        errorEmail.style.display="block";
        document.getElementById('email').focus();
        isValidated=false;

    }
    else{
        errorEmail.style.display="none";
    }
    if(username==''){
        errorUsername.innerHTML='&#xf071; username empty';
        errorUsername.style.display="block";
        document.getElementById('username').focus();
        isValidated=false;

    }
    else{
        errorEmail.style.display="none";
    }
    if(password==''){
        errorPassword.innerHTML='&#xf071; password empty';
        errorPassword.style.display="block";
        document.getElementById('password').focus();
        isValidated=false;

    }else if(password.length<8){
        errorPassword.innerHTML='&#xf071; password cannot be less than 8';
        errorPassword.style.display="block";
        document.getElementById('password').focus();
        isValidated=false;

    }else{
        errorPassword.style.display="none";
    }
    if(reEnteredPassword==''){
        errorReEnteredPassword.innerHTML='&#xf071; Re-entered password <br> is empty';
        errorReEnteredPassword.style.display="block";
        document.getElementById('re-entered-password').focus();
        isValidated=false;
    }
    else{
        errorReEnteredPassword.style.display="none";
    }
    if(password!=reEnteredPassword){
        errorPassword.innerHTML='&#xf071; password and <br> re-enter password must <br> be same';
        errorPassword.style.display="block";
        errorReEnteredPassword.innerHTML='&#xf071; password <br> and re-enter password must <br> be same';
        errorReEnteredPassword.style.display="block";
        document.getElementById('password').focus();
        isValidated=false;
    }
    if (isValidated && confirm('Are you sure you want to create acount on this page?')) {
        document.getElementById('for-form').submit();
    } else {
        return false;
    }
}