            <!--=============== FOOTER ===============-->
            <section class="footer">
              <div class="footer-content">
                <a href="index.html">
                  <img id="myImg" src="{{ url('/images/logo.png') }}"> </a>   
                  <p>© 2025 GamerHub. All rights reserved.</p>
  
                  <div class="icons">
                      <a href="https://www.facebook.com/profile.php?id=61574674164632"><i class='bx bxl-meta'></i></a>
                      <a href="#"><i class='bx bxl-instagram' ></i></a>
                      <a href="https://x.com/GamerHubTeam42"><i class='bx bxl-twitter' ></i></a>
                      <a href="https://www.reddit.com/user/GamerHubTeam42/"><i class='bx bxl-reddit' ></i></a>
                  </div>
              </div>
  
              <div class="footer-content">
                  <h4>Products</h4>
                  <li><a href="{{ url('/products/categories/mice') }}">Mice</a></li>
                  <li><a href="{{ url('/products/categories/keyboards') }}">Keyboards</a></li>
                  <li><a href="{{ url('/products/categories/monitors') }}">Monitors</a></li>
                  <li><a href="{{ url('/products/categories/speakers') }}">Speakers</a></li>
                  <li><a href="{{ url('/products/categories/microphones') }}">Microphones</a></li>
              </div>
  
              <div class="footer-content">
                  <h4>Deals</h4>
                  <li><a href="{{ url('/deals') }}">Limited offer</a></li>
                  <li><a href="{{ url('/deals') }}/#catalogue">Discounted items</a></li>

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