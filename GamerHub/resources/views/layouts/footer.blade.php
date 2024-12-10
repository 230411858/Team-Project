        <!--=============== FOOTER ===============-->
        <section class="footer">
            <div class="footer-content">
                <img height="128px" src="{{ url('/images/logo.png') }}"> <!--=== TO DO ==-->
                <p>© 2024 GamerHub. All rights reserved.</p>

                <div class="icons">
                    <a href="#"><i class='bx bxl-meta'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-reddit'></i></a>
                </div>
            </div>

            <div class="footer-content">
                <h4>Products</h4>
                <li><a href="{{ url('/products/category/mice') }}">Mice</a></li>
                <li><a href="{{ url('/products/category/keyboards') }}">Keyboards</a></li>
                <li><a href="{{ url('/products/category/monitors') }}">Monitors</a></li>
                <li><a href="{{ url('/products/category/audio') }}">Audio</a></li>
            </div>

            <div class="footer-content">
                <h4>Deals</h4>
                <li><a href="#">Deals</a></li>
                <li><a href="#">Bundles</a></li>
            </div>

            <div class="footer-content">
                <h4>Support</h4>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
            </div>

        </section>

        <!--=============== MAIN JS ===============-->
        <script src="{{ url('/js/products.js') }}"></script>
        <script src="{{ url('/js/swiper-bundle.min.js') }}"></script>
        </body>
</html>