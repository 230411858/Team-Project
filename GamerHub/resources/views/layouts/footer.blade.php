        <!--=============== FOOTER ===============-->
        <section class="footer">
            <div class="footer-content">
                <img src="{{ url('/images/logo.png') }}">      <!--=== TO DO ==-->
                <p>aaaaaaaaaa aaaaaaaaa aaaaaaaaaa aaaaaaaaaaa aaaaaaaaaa aaaaaaa</p>

                <div class="icons">
                    <a href="#"><i class='bx bxl-meta'></i></a>
                    <a href="#"><i class='bx bxl-instagram' ></i></a>
                    <a href="#"><i class='bx bxl-twitter' ></i></a>
                    <a href="#"><i class='bx bxl-reddit' ></i></a>
                </div>
            </div>

            <div class="footer-content">
                <h4>Products</h4>
                <li><a href="{{ url('/products/category/mice') }}">Mice</a></li>
                <li><a href="{{ url('/products/category/keyboards') }}">Keyboards</a></li>
                <li><a href="{{ url('/products/category/monitors') }}">Monitor</a></li>
                <li><a href="{{ url('/products/category/audio') }}">Audio</a></li>
            </div>

            <div class="footer-content">
                <h4>Deals</h4>
                <li><a href="#">Discounted items</a></li>
                <li><a href="#">Black Friday</a></li>
                <li><a href="#">Bundles</a></li>
            </div>

            <div class="footer-content">
                <h4>Support</h4>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </div>

        </section>
    <script src="{{ url('/js/headerfooter.js') }}"></script>
    @yield('js')
    </body>
</html>