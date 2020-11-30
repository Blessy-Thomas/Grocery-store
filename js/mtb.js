$(document).ready(function() {                 
    $("#login_form").submit(function(e){
      e.preventDefault();
      $.ajax({
      url:'check_authentication.php',
      type:'POST',
      data: {username:$("#email").val(), password:$("#password").val()},
      success: function(resp) {
         if(resp == "invalid") {
          $("#errorMsg").html("Invalid username and password!");  
         } 
         else {
          window.location.href= resp;
         }
      }
     });
  });
