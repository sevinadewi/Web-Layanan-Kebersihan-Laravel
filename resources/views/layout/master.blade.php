<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--=============== Favicon ===============-->
    <link
      rel="shortcut icon"
      href="./images/favicon-32x32.png"
      type="image/png"
    />
    <!--=============== Swiper CSS ===============-->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <!--=============== Boxicons ===============-->
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!--=============== Custom StyleSheet ===============-->
    {{-- <link rel="stylesheet" href="./css/styles.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/detail.css')}}">




    <title>FDelivery</title>
  </head>
  <body>
    <!--=============== Header ===============-->
    <header class="header">
      <nav class="navbar">
        <div class="row d-flex container">
          <a href="" class="logo d-flex">
            <img src="./images/logo.png" alt="" />
          </a>

          <ul class="nav-list d-flex">
            <a href="">Home</a>
            <a href="">About</a>
            <a href="">Shop</a>
            <a href="">Food</a>
            <a href="">Recipes</a>
            <a href="">Contact</a>
            <span class="close d-flex"><i class="bx bx-x"></i></span>
          </ul>

          <div class="col d-flex">
            <form>
              <input type="search" placeholder="Search your item" />
              <button class="d-flex"><i class="bx bx-search"></i></button>
            </form>
            <div class="cart-icon d-flex">
              <i class="bx bx-shopping-bag"></i>
              <span>0</span>
            </div>
            <a class="btn signin">Sign In</a>
            
          </div>

          <!-- Hamburger -->
          <div class="hamburger d-flex">
            <i class="bx bx-menu"></i>
          </div>
        </div>
      </nav>

      <!--=============== Home ===============-->
      
      <!--=============== SignIn Form ===============-->
      <div class="wrapper">
        <form action="" class="form">
          <h2>SIGN IN</h2>

          <div class="control">
            <label for="">Enter Email:</label>
            <input type="email" placeholder="Enter Your Email" />
          </div>
          <div class="control">
            <label for="">Password:</label>
            <input type="password" placeholder="Password" />
          </div>
          <div class="checkbox d-flex">
            <input type="checkbox" />
            <span>Remember Me</span>
          </div>
          <button class="btn">Sign In</button>
          <div class="links">
            <span>Forgot Password? <a href="">Click Here</a></span>
            <span>Don't Have An Account? <a href="">Create One</a></span>
          </div>
        </form>

        <div class="close-form">
          <i class="bx bx-x"></i>
        </div>
      </div>
    </header>

    <main>
        @yield('content')
    </main>

   
    <!--=============== Footer ===============-->
    <footer class="footer">
      <div class="row container">
        <div class="col">
          <div class="logo d-flex">
            <img src="./images/logo.png" alt="logo" />
          </div>
          <p>
            Retail food delivery is a courier service in which a restaurant,
            store, or independent food-delivery
          </p>
          <div class="icons d-flex">
            <div class="icon d-flex">
              <i class="bx bxl-facebook"></i>
            </div>
            <div class="icon d-flex"><i class="bx bxl-twitter"></i></div>
            <div class="icon d-flex"><i class="bx bxl-linkedin"></i></div>
          </div>
        </div>
        <div class="col">
          <div>
            <h4>Company</h4>
            <a href="">About Us</a>
            <a href="">Blog</a>
            <a href="">All Products</a>
            <a href="">Locations Map</a>
          </div>
          <div>
            <h4>Services</h4>
            <a href="">Order tracking</a>
            <a href="">Wish List</a>
            <a href="">My account</a>
            <a href="">Terms & Conditions</a>
          </div>
          <div>
            <h4>Support</h4>
            <a href="">FAQ</a>
            <a href="">Policy </a>
            <a href="">Business</a>
            <a href="">Support Carrer</a>
          </div>
          <div>
            <h4>Contact</h4>
            <a href="">WhatsApp</a>
            <a href="">Support 24 </a>
            <a href="">Quick Chat</a>
          </div>
        </div>
      </div>
    </footer>
    <div class="footer-bottom">
      <div class="row container d-flex">
        <p>Copyright © 2021 Pixency</p>
        <p>Created by Asha</p>
      </div>
    </div>

    <!--=============== Swiper JS ===============-->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!--=============== Custom JS ===============-->
    <script src="./js/testimonial.js"></script>
    <script src="./js/products.js"></script>
    <script src="./js/main.js"></script>
  </body>
</html>
