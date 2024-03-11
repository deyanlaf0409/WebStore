<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolve password</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh; /* Set the body to fill the viewport height */
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }

    .back-link {
        top: 100px;
        left: 100px;
        display: inline-block;
        padding: 25px 25px; /* Increase padding for a larger button */
        background-color: white;
        text-decoration: none;
        border-radius: 25px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        position: relative;
        transition: transform 0.3s ease;
    }

    .back-link::before {
        content: ""; /* Required for pseudo-elements */
        position: absolute;
        top: 50%; /* Adjust to vertically center the arrow */
        left: 11px; /* Adjust to change the distance between the arrow and text */
        width: 25px; /* Set the width of the arrow */
        height: 25px; /* Set the height of the arrow */
        background-image: url('../../res/arrow-left.png'); /* Replace with your image path */
        background-size: contain; /* Ensure the entire image is visible */
        background-repeat: no-repeat;
        transform: translateY(-50%); /* Centers the arrow vertically */
    }

    .back-link:hover {
        transform: scale(1.1);
    }

    /* Add a class for the fade-in effect */
    .fade-in {
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }   

    form {
        margin: 200px auto;
        text-align: center;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 15px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        position: relative;
        opacity: 0;
    }

    .fade-in form {
        opacity: 1;
    }

    .btn {
        background: blue; /* Initial background color */
        color: white;
        padding: 8px 16px;
        margin-right: 2px;
        text-decoration: none;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        top: 10px; /* Adjust top position */
        left: 50px; /* Adjust left position */
        transition: background-color 0.3s, color 0.3s; /* Smooth transition effect */
        background-image: linear-gradient(45deg, transparent 50%, rgba(255, 255, 255, 0.4) 50%);
        background-size: 200%;
        background-position: 100%;
    }

    input[type="email"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
        box-sizing: border-box;
    }

    .btn:hover {
        background-color: rgb(15, 122, 255); /* Change background color on hover */
        color: white; /* Change text color on hover */
        background-position: 0;
    }
</style>
    <link rel="icon" type="image/x-icon" href="/project/favicon.ico">
    <link rel="stylesheet" href="../../master/footer-style.css">
</head>
<body>
    <div class="custom-arrow">
        <a href="../construct.php" class="back-link"></a>
    </div>
    <form class="fade-in" id="success-container" onsubmit="submitForm(event)">
        <p>Enter the registered E-mail:</p>
        <input type="email" id="email" name="email" required>
        <button type="submit" class="btn">Next</button>
    </form>

    <?php include '../../master/footer.php'; ?>

    <!-- ... (your existing HTML) ... -->

<script>
    var form = document.getElementById("success-container");
// Set form opacity to 1
form.style.opacity = 1;

function submitForm(event) {
    event.preventDefault(); // Prevent the default form submission

    var emailInput = document.getElementById("email");
    var email = emailInput.value.trim(); // Trim leading and trailing spaces

    // Update the displayed email input value
    emailInput.value = email;

    // Send the email to the PHP file using AJAX
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response here
            var response = xhr.responseText;

            console.log("Server response: ", response);

            // Do something with the 'exists' variable
            if (response.trim() === "true") {
                console.log("Email exists");
                console.log(email);
                sendPassword();
            } else {
                alert("Email is not registered or does not exist");
                console.log("Email does not exist");
            }
        }
    };

    xhr.open("POST", "check_email.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("email=" + encodeURIComponent(email));
}



function sendPassword() {

    var emailInput = document.getElementById("email");
    var email = emailInput.value.trim();

    var xhrPassword = new XMLHttpRequest();
    xhrPassword.onreadystatechange = function() {
        if (xhrPassword.readyState == 4 && xhrPassword.status == 200) {
            // Handle the response here
            var responsePassword = xhrPassword.responseText;
            console.log("Server response: ", responsePassword);
            if(responsePassword === 'success'){
                window.location.href = "success_mail_page.php";
            }
        }
    };

    xhrPassword.open("POST", "testmail.php", true);
    xhrPassword.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhrPassword.send("email=" + encodeURIComponent(email));
}

</script>


    
</body>
</html>
