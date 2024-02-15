
function checkRegister(event) {
    event.preventDefault();
    var username = document.getElementById("username").value;
    var email = document.getElementById("email");
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    var checkbox = document.getElementById("agree");
  
    if (!username || !email.value || !password || !confirmPassword) {
      alert("Please fill in all the fields.");
      event.preventDefault(); // Cancel the form submission
      return false;
    }
  
    if (!email.checkValidity()) {
      alert("Please enter a valid email address.");
      event.preventDefault(); // Cancel the form submission
      return false;
    }
  
    // Password validation
    if (password.length < 8) {
      alert("Password must be at least 8 characters long.");
      event.preventDefault(); // Cancel the form submission
      return false;
    }
  
    if (password !== confirmPassword) {
      alert("Passwords do not match.");
      event.preventDefault(); // Cancel the form submission
      return false;
    }
  
    if (!checkbox.checked) {
      alert("Please agree to the terms and conditions.");
      event.preventDefault(); // Cancel the form submission
      return false;
    }
  
    
    // Registration logic...
    // Assuming the registration logic is successful, proceed with redirection.
  
     // Assuming validation passes, send registration data to server using AJAX
     var xhr = new XMLHttpRequest();
     xhr.open("POST", "../php/index.php", true);
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     
     xhr.onreadystatechange = function () {
       if (xhr.readyState === XMLHttpRequest.DONE) {
         if (xhr.status === 200) {
           // Registration successful, redirect
           window.location.href = "http://localhost/Register/Confirmation/verify-page.html";
         } else {
           alert("Registration failed. Please try again later.");
         }
       }
     };
     
     var data = "username=" + encodeURIComponent(username) +
                "&email=" + encodeURIComponent(email.value) +
                "&password=" + encodeURIComponent(password);
     xhr.send(data);
  
    // Redirect to the confirmation page if all conditions are met and registration is successful.
    //window.location.href = "http://localhost:8080/Register/Confirmation/verify_page.html";
  }
  
  
  
  
  var registerButton = document.getElementById("register-button");
  var regForm = document.getElementById("reg-form");
  // Set form opacity to 1
  regForm.style.opacity = 1;

  var xPos = registerButton.offsetLeft; // Get the initial left position of the button
  var isLeft = true;
  
  registerButton.onmouseover = function(e) {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email");
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    var checkbox = document.getElementById("agree");
  
    if (!username || !email.value || !email.checkValidity() || !password || !confirmPassword || !checkbox.checked) {
      if (isLeft) {
        xPos = 260;
      } else {
        xPos = 80;
      }
      registerButton.style.left = xPos + "px";
      isLeft = !isLeft;
    }
  };