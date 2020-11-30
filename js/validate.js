function myFunction() {
    var x = document.getElementById('myTopnav');
    if (x.className === 'topnav') {
      x.className += ' responsive';
    } else {
      x.className = 'topnav';
    }
  }
  
  function refresh() {
    console.log('hello');
    location.reload();
  }
  form.addEventListener('submit', (e) => {
      formValidation();
  });

let firstName = document.forms['signup']['fname'];
let lastName = document.forms['signup']['lname'];
let email = document.forms['signup']['email'];
let phoneNumber = document.forms['signup']['phone_number'];
let password = document.forms['signup']['password'];
let password2 = document.forms['signup']['confirm_password'];
let address = document.forms['signup']['Address'];
let pincode = document.forms['signup']['pincode'];
// let email_error = document.getElementById('email_error');
//  pass_error = document.getElementById('pass_error');


password.addEventListener('textInput', pass_Verify);
email.addEventListener('textInput', email_Verify);
function formValidation(){
    // trim to remove the whitespaces
    const firstNameValue = firstName.value.trim();
    const lastNameValue = lastName.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    const addressValue = address.value.trim();
    const emailValue = email.value.trim();
    const phoneNumberValue = phoneNumber.value.trim();
    const pincodeValue = pincode.value.trim();

    var showError = true;

    var letters = /^[A-Za-z]+$/;
  
    // for first name
    if (firstNameValue === '') {
      // show error
      // adding error class
      setErrorFor(firstName, "First Name can't be blank");
      showError = false;
    } else if(!(firstNameValue.match(letters))){
        setErrorFor(firstName,'Your first name not accepted, enter only characters!');
    }
    else if(firstNameValue.length > 32) {
        setErrorFor(firstName, "First Name length should be less than 32!");
        showError = false;
    }else {
      // adding success class
      setSuccessFor(firstName);
    }
    // for last name
    if (lastNameValue === '') {
        // show error
        // adding error class
        setErrorFor(lastName, "Last Name can't be blank");
        showError = false;
    } else if(!(lastNameValue.match(letters))){
        setErrorFor(lastName,'Your last name not accepted, enter only characters!');
    }else if(lastNameValue.length > 32) {
        setErrorFor(lastName, "Last Name length should be less than 32!");
        showError = false;
    }else {
        // adding success class
        setSuccessFor(lastName);
    }


    if(emailValue.length == 0) {
        setErrorFor(email, 'Email cannot be blank');
        showError = false;
    } else if(!(emailValue.length > 9)) {
        setErrorFor(email, "Email length should be greater than 9!");
        showError = false;
    } 
    else if (!email_Verify(emailValue)) {
        setErrorFor(email, 'Not a valid email');
        showError = false;
    } else {
        setSuccessFor(email);
        
    }
  
    var passwordValidationRegex = new RegExp(
        '^(?=.*[a-z])(?=.*[A-Z])(?=.*d)(?=.*[@$!%*?&])[A-Za-zd@$!%*?&]{8,}$'
      );
      if (passwordValue === '') {
        // show error
        // adding error class
        setErrorFor(password, "Password can't be blank");
        showError = false;
      } else if (!(passwordValue.length > 8 && passwordValue.length < 16)) {
        setErrorFor(
          password,
          'Password minimum length should be 8 and maximum length should be 16'
        );
        showError = false;
      } else if (passwordValidationRegex.test(passwordValue)) {
        setErrorFor(password, 'Password must contain special character');
        showError = false;
      } else {
        // adding success class
        setSuccessFor(password);
      }
    
      // Confirm Password
      if (password2Value === '') {
        // show error
        // adding error class
        setErrorFor(password2, "Confirm Password can't be blank");
        showError = false;
      } else if (passwordValue !== password2Value) {
        setErrorFor(password2, "Confirm Password doesn't match");
        showError = false;
      } else {
        // adding success class
        setSuccessFor(password2);
      }
       // Address
    if (addressValue === '') {
        // show error
        // adding error class
        setErrorFor(address, "Address can't be blank");
        showError = false;
    } else {
        setSuccessFor(address);
    }
    //Phone Number
    if (phoneNumberValue === '') {
        setErrorFor(phoneNumber, "Phone Number can't be blank");
        showError = false;
    } else if (isPhoneNumber(phoneNumberValue)) {
        setErrorFor(phoneNumber, 'Please Enter Proper Phone Number');
        showError = false;
    } else {
        setSuccessFor(phoneNumber);
    }
    //Pincode
    if (pincodeValue === '') {
        setErrorFor(pincode, "Pin Code can't be blank");
        showError = false;
    } else if (isIndianPincode(pincodeValue)) {
        setErrorFor(pincode, 'Please Enter Proper Pincode');
        showError = false;
    } else {
        setSuccessFor(pincode);
    }

    if (showError) {
        return true;
    } else {
        return false;
    }
  
}
function setErrorFor(input, message) {
    const inputBox = input.parentElement;
    const small = inputBox.querySelector('small');
    inputBox.className = 'inputBox error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const inputBox = input.parentElement;
    inputBox.className = 'inputBox success';
    // small.style.display = "none";
}
function isPhoneNumber(phoneNumber) {
    return !/^[789][0-9]{9}$/.test(phoneNumber);
  }
  
function isIndianPincode(pincode) {
    return !/^[1-9][0-9]{5}$/.test(pincode);
}
function email_Verify(email){
    return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email);
}

