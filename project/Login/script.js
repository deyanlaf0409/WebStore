var myButton = document.getElementById("evil-button");
var loginForm = document.getElementById("login-form");
// Set form opacity to 1
loginForm.style.opacity = 1;

var xPos = myButton.offsetLeft;
var isLeft = true;

myButton.onmouseover = function (e) {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  if (!email || !password) {
    if (isLeft) {
      xPos = 260;
    } else {
      xPos = 80;
    }
    myButton.style.left = xPos + "px";
    isLeft = !isLeft;
    
  }
};

function checkLogin(event) {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  if (!email || !password) {
    alert("Please enter both e-mail and password.");
    event.preventDefault();
    return false;
  }

  if (password.length < 8) {
    alert("Invalid password.");
    event.preventDefault();
    return false;
  }

  // Other validation logic...

  window.location.reload();
}



