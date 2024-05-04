<footer class="site-footer">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <div class="footer-container">
            <div class="blue-section"></div>
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Contact Us</h4>
                    <p>Email: info@example.com</p>
                    <p>Phone: +1 (123) 456-7890</p>
                </div>
                <div class="footer-section">
                    <h4>Stay in Touch</h4>
                    <ul class="social-links">
                        <li><a href="https://www.instagram.com/"><img id="instagram-icon" src="/project/res/instagram-logo.png" alt="Instagram" width="25" height="25"></a></li>
                        <li><a href="https://www.linkedin.com/"><img id="linkedin-icon" src="/project/res/linkedIn-logo.png" alt="LinkedIn" width="25" height="25"></a></li>
                        <!-- Add more social icons as needed -->
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Customer Services</h4>
                    <ul class="services">
                        <li><a href="#">Terms and Conditions</a></li>
                        <li><a href="#">Privacy and Policy</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>

                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 YourCompanyName. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    


    <script>
  $(document).ready(function () {
    var startScrollEffect = false; // Flag to determine when to start the effect
    var thresholdPercentage = 50; // Set the threshold percentage to start the effect

    // Set the initial width of the blue section to 100% when the document is ready
    $(".blue-section").css("width", "100%");

    $(window).scroll(function () {
      var scrollPercentage = ($(window).scrollTop() / ($(document).height() - $(window).height())) * 100;
      var blueSectionWidth = 100 - Math.min(25 + scrollPercentage, 100); // Calculate the width of the blue section

      // Check if the scroll percentage has reached the threshold
      if (scrollPercentage >= thresholdPercentage) {
        // Set the flag to true, indicating to start the effect
        startScrollEffect = true;
      }

      // Adjust the blue section width based on the scroll percentage
      $(".blue-section").css("width", blueSectionWidth + "%");

      // Set the initial width to 100% if the scroll percentage is less than the threshold
      if (scrollPercentage < thresholdPercentage && !startScrollEffect) {
        $(".blue-section").css("width", "100%");
      } else if (scrollPercentage === 0) {
        $(".blue-section").css("width", "100%");
        startScrollEffect = false; // Reset the flag when scrolling back to the top
      }
    });
  });
</script>

