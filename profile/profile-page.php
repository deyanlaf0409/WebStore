<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
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
            background-image: url('../res/arrow-left.png'); /* Replace with your image path */
            background-size: contain; /* Ensure the entire image is visible */
            background-repeat: no-repeat;
            transform: translateY(-50%); /* Centers the arrow vertically */
        }   
  
        .back-link:hover {
            transform: scale(1.1);
        }

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
            margin: 50px auto;
            width: 300px;
            height: 400px;
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

        .order-status {
            background-color: #ddd;
            padding: 10px;
            margin-top: 20px;
            border-radius: 10px;
        }

        .delete-button {
            background-color: rgb(237, 43, 43);
            color: white;
            border: none;
            padding: 10px 10px;
            position: absolute;
            bottom: 20px;
            right: 20px;
            border-radius: 50px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: rgb(189, 32, 32);
        }


        @media screen and (max-width: 700px) {
            .back-link {
                top: 20px; 
                left: 10px; 
            } 
        }

    </style>




    <link rel="icon" type="image/x-icon" href="/project/favicon.ico">
    <link rel="stylesheet" href="../master/footer-style.css">
</head>
<body>

    <div class="custom-arrow">
        <a href="user-page.php" class="back-link"></a>
    </div>

    <form class="fade-in" id="success-container">
        <h1>

            <img src="../res/Default_pfp.png" width="110" height="110">

        </h1>

        <h2>
        <?php
        // Start session
        session_start();

        // Check if the username is set in the session
        if (isset($_SESSION['username'])) {
            // Retrieve the username from the session
            $username = $_SESSION['username'];
            
            echo "<h1>$username</h1>";
        } else {
            // If username is not set, display default message
            header("Location: /project/Login/construct.php");
        }
        ?>
        </h2>

        <h3 style="text-align: left;">Orders:</h3>
        <div class="order-status">
            <!-- Add your order status here -->
        </div>

        <button class="delete-button">Delete Account</button>

    </form>

    <?php include '../master/footer.php'; ?>

    <script>
        var form = document.getElementById("success-container");
        // Set form opacity to 1
        form.style.opacity = 1;
    </script>

</body>
</html>