<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>DomainName</title>
    <link rel="icon" type="image/x-icon" href="/project/favicon.ico">
    <link rel="stylesheet" href="indexstyle.css">
    <link rel="stylesheet" href="master/footer-style.css">
</head>

<body>
    <header id="home">
    </header>

    <nav>
        <a href="Login/construct.php" class="login-btn" id="log-btn">Login</a>
        <a href="Register/register-construct.php" class="register-btn" id="reg-btn">Register</a>
        
        <a href="#about" onclick="closeDropdown()" class="about">About Us</a>
        <a href="#shop" onclick="closeDropdown()" class="shop">Shop</a>
        <a href="#membership" onclick="closeDropdown()" class="membership">Membership</a>

        <button class="dropdown-btn">≡</button>
        <div class="dropdown-content">
            <a href="#about">About Us</a>
            <a href="#shop">Shop</a>
            <a href="#membership">Membership</a>
        </div>

        <a href="#cart" class="cart">Cart</a>
    </nav>

    <div class="container">
        <section id="about" class="section">
            <h2 class="section-header">About Us</h2>
            <p>







            </p>
        </section>

        <section id="shop" class="section">
            <h2 class="section-header">Shop Products</h2>
            <p>







            </p>
        </section>

        <section id="membership" class="section">
            <h2 class="section-header">Membership</h2>
            <p>







            </p>
        </section>

        <section id="cart" class="section">
            <h2 class="section-header">Your Products</h2>
            <p>







            </p>
        </section>

        <button id="scrollToTopBtn" class="scroll-to-top-btn"></button>
    </div>

    <?php include 'master/footer.php'; ?>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add 'fade-in' class to elements with class 'login-btn' and 'register-btn'
            document.querySelector('.login-btn').classList.add('fade-in');
            document.querySelector('.register-btn').classList.add('fade-in');
        });

        var logBtn = document.getElementById("log-btn");
        logBtn.style.opacity = 1;
        var regBtn = document.getElementById("reg-btn");
        regBtn.style.opacity = 1;
    </script>
    

    <script>
        
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
    
                
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
    
                
                const offsetTop = targetElement.offsetTop;
                const headerHeight = document.querySelector('header').offsetHeight;
                const offset = offsetTop - headerHeight;
    
                
                window.scrollTo({
                    top: offset,
                    behavior: 'smooth'
                });
            });
        });
    </script>


<script>
    const scrollToTopButton = document.querySelector(".scroll-to-top-btn");

    window.addEventListener("scroll", () => {
        if (window.pageYOffset > 100) {
            scrollToTopButton.classList.add("show");
        } else {
            scrollToTopButton.classList.remove("show");
        }
    });

    scrollToTopButton.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
</script>


<script>
    function closeDropdown() {
        document.querySelector('.dropdown-btn').classList.remove('active');
    }

    document.querySelector('.dropdown-btn').addEventListener('click', function () {
        this.classList.toggle('active');
    });

    // Add event listeners for links inside the dropdown content
    document.querySelectorAll('.dropdown-content a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            closeDropdown(); // Close the dropdown when a link is clicked
        });
    });
</script>



</body>

</html>


