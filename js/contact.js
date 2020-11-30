
let Name = document.forms['contact']['name'];
let subject = document.forms['contact']['subject'];
let email = document.forms['contact']['emailaddres'];
let phoneNumber = document.forms['contact']['phonenumber'];
let message = document.forms['contact']['message'];

function validate(){
  const NameValue = Name.value.trim();
  const subjectValue = subject.value.trim();
  const emailValue = email.value.trim();
  const phoneNumberValue = phoneNumber.value.trim();
  const messageValue = message.value.trim();
  const error_message = document.getElementById("error_message");
    
    error_message.style.padding = "10px";
    var letters = /^(\w\w+)\s(\w+)$/;
    var text;
  
    if(NameValue.length ==0){
      text = "Please Enter valid Name";
      error_message.innerHTML = text;
      NameValue.focus();
      return false;
    }
    if(!(NameValue.match(letters))){
      text = "Please Enter valid Name, only characters allowed!!";
      error_message.innerHTML = text;
      NameValue.focus();
      return false;
    }
    // else if(NameValue.length > 32) {
    //     text = "Namelength should be less than 32!!";
    //     error_message.innerHTML = text;
    //     return false;
    // }
    if(subjectValue.length ==0){
        text = "Please Enter the Subject";
        error_message.innerHTML = text;
        return false;
      }
    if(subjectValue.length < 10){
      text = "Please Enter Correct Subject";
      error_message.innerHTML = text;
      return false;
    }
    if (phoneNumberValue === '') {
        text = "Please mobile number cannot be blank!!";
        error_message.innerHTML = text;
        return false;
    } 
    if (isPhoneNumber(phoneNumberValue)) {
        text = "Please Enter valid mobile number";
        error_message.innerHTML = text;
        return false;
    }
    if(emailValue.length == 0) {
        text = "Please Email cannot be blank!!";
        error_message.innerHTML = text;
        return false;
    } 
    if(!(emailValue.length > 9)) {
        text =  "Email length should be greater than 9!";
        error_message.innerHTML = text;
        return false;
    } 
    if (!email_Verify(emailValue)) {
        text =  "Not Valid Email!";
        error_message.innerHTML = text;
        return false;
    }
    if(messageValue.length==0){
        text = "Please Enter your Message";
        error_message.innerHTML = text;
        return false;
    }
    if(messageValue.length <20){
      text = "Please Enter Message with Min 20 Characters";
      error_message.innerHTML = text;
      return false;
    }
    function isPhoneNumber(phoneNumber) {
        return !/^[789][0-9]{9}$/.test(phoneNumber);
    }
    function email_Verify(email){
        return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email);
    }
  }