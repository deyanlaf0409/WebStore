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
