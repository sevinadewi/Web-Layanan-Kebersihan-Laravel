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
            <a href="">Order</a>
            <a href="">Review</a>
            <a href="">Contact</a>
            <span class="close d-flex"><i class="bx bx-x"></i></span>
          </ul>

          <div class="col d-flex">
            {{-- <form>
              <input type="search" placeholder="Search your item" />
              <button class="d-flex"><i class="bx bx-search"></i></button>
            </form>
            <div class="cart-icon d-flex">
              <i class="bx bx-shopping-bag"></i>
              <span>0</span>
            </div> --}}
            {{-- <a class="btn signin">Sign In</a> --}}
            @guest
            <a type="button" class="btn btn-primary rounded-pill" href="{{route('login')}}" class="">
              Login
            </a>
            @endguest
            @auth
              @if(Auth::user()->role == 'admin')
                <a type="button" class="btn btn-primary rounded-pill" href="{{route('login')}}" class="">
                  Dashboard
                </a>
              @else
                <a type="button" class="btn btn-primary rounded-pill" href="{{route('logout')}}" class="">
                  Logout
                </a>
              @endif
            @endauth
          </div>

          <!-- Hamburger -->
          <div class="hamburger d-flex">
            <i class="bx bx-menu"></i>
          </div>
        </div>
      </nav>

      <!--=============== Home ===============-->
      <div class="home">
        <div class="row container">
          <div class="col">
            <div class="faster">
              Cleaning Service
              <div class="image d-flex">
                <img src="./images/french-fries.svg" alt="" />
              </div>
            </div>
            <h1>
              "Impeccable Cleaning Services " <br />
              
              <span class="color">You Can Trust</span>
            </h1>
            <p>
              Utilizing modern equipment and trained teams.
            </p>
            <a href="" class="btn">Explore</a>
          </div>
          <div class="col">
            <img src="{{asset('assets/images/cleaning_hero.svg')}}" alt="" />
      
          </div>
        </div>
      </div>

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

    <!--=============== Services ===============-->
    <section class="section services" id="services">
      <div class="row container">
        <div class="col">
          <h2>Our services</h2>
          <p>
            We provide a wide range of cleaning services tailored to meet your needs. Our dedicated team ensures a spotless environment with attention to detail
          </p>
        </div>
        
        <div class="col">
          <div class="card clickable">
            <img src="./images/meat-icon.svg" alt="" />
            <a href="{{ route('generalCleaning.get') }}">
            <h3>
              General <br />
              cleaning <br />
            </h3>
          </a>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="./images/delivery-icon.svg" alt="" />
            <h3>
              Deep <br />
              Cleaning <br />
              
            </h3>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="./images/phone-icon.svg" alt="" />
            <h3>
              Furniture <br />
              Cleaning <br />
              
            </h3>
          </div>
        </div>
      </div>
    </section>

    <!--=============== About ===============-->
    <section class="section about" id="about">
      <div class="row container">
        <div class="col">
          <img src="./images/delivery-guy-2.svg" alt="" />
        </div>
        <div class="col">
          <h2>Take a look at the benefits we offer for you</h2>
          <p>
            Good service means a friendly, welcoming service. A restaurant owner
            should not merely strive to avoid bad service,
          </p>
          <div class="d-grid">
            <div class="card">
              <img src="{{asset('assets/images/car-icon.svg')}}" alt="" />
              <h4>Fast Respon</h4>
              <span>For all orders over $50</span>
            </div>
            <div class="card">
              <img src="{{asset('assets/images/dollar-icon.svg')}}" alt="" />
              <h4>Profesional Team</h4>
              <span>Money Back Guarantee</span>
            </div>
            <div class="card">
              <img src="{{asset('assets/images/security-icon.svg')}}" alt="" />
              <h4>Secure Payment</h4>
              <span>100% Secure Payment</span>
            </div>
            <div class="card">
              <img src="{{asset('assets/images/time-icon.svg')}}" alt="" />
              <h4>Quality Support</h4>
              <span>Alway Online 24/7</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--=============== Recipes ===============-->
    <section class="section recipes" id="recipes">
      <h2>Try Our Special Recipes</h2>
      <div class="row container">
        <div class="filters d-flex">
          <span data-filter="All Product">See All Product</span>
          <span data-filter="Fast Food">Fast Food</span>
          <span data-filter="Rice Menu">Rice Menu</span>
          <span data-filter="Desserts">Desserts</span>
          <span data-filter="Coffee">Coffee</span>
          <span data-filter="Pizza">Pizza</span>
        </div>
        <div class="products">
          <div class="swiper mySwiper">
            <div class="swiper-wrapper" id="products-wrapper">
              <!-- <div class="swiper-slide">
                <div class="card">
                  <div class="image"><img src="./images/meat-2.svg" alt=""></div>
                  <div class="rating">
                  <span><i class="bx bxs-star"></i></span>
                  <span><i class="bx bxs-star"></i></span>
                  <span><i class="bx bxs-star"></i></span>
                  <span><i class="bx bxs-star"></i></span>
                  <span><i class="bx bxs-star"></i></span>
                  </div>
                  <h4>Crispy Fried Chicken</h4>
                  <div class="price">
                    <span>Price</span><span class="color">$13.00</span>
                  </div>
                  <div class="button">Add To Cart+</div>
                </div>
              </div> -->
            </div>
          </div>
          <div class="pagination">
            <div class="custom-pagination"></div>
          </div>
        </div>
      </div>
    </section>
    <!--=============== Testimonials ===============-->
    <section class="section testimonials" id="testimonials">
      <div class="row container">
        <div class="col">
          <div class="card" data-filter="rosele">
            <div class="d-flex">
              <div class="image">
                <img src="./images/profile-1.jpg" alt="" />
              </div>
              <div>
                <h4>Rosele Desoza</h4>
                <span>Marketing Coordinator</span>
              </div>
            </div>
          </div>
          <div class="card" data-filter="marvin">
            <div class="d-flex">
              <div class="image">
                <img src="./images/profile-2.jpg" alt="" />
              </div>
              <div>
                <h4>Marvin McKinney</h4>
                <span>Web Designer</span>
              </div>
            </div>
          </div>
          <div class="card" data-filter="guy">
            <div class="d-flex">
              <div class="image">
                <img src="./images/profile-3.jpg" alt="" />
              </div>
              <div>
                <h4>Guy Hawkins</h4>
                <span>President of Sales</span>
              </div>
            </div>
          </div>
          <div class="card" data-filter="kathryn">
            <div class="d-flex">
              <div class="image">
                <img src="./images/profile-4.jpg" alt="" />
              </div>
              <div>
                <h4>Kathryn Murphy</h4>
                <span>Marketing Coordinator</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <h2>
            What our Customers <br />
            <span>are saying</span>
          </h2>
          <div class="test-wrapper">
            <div class="testimonial active" data-id="rosele">
              <div class="d-flex">
                <div>
                  <h4>Rosele Desoza</h4>
                  <span>Marketing Coordinator</span>
                </div>

                <div class="rating">
                  <span><i class="bx bxs-star"></i></span>
                  <span><i class="bx bxs-star"></i></span>
                  <span><i class="bx bxs-star"></i></span>
                  <span><i class="bx bxs-star"></i></span>
                  <span><i class="bx bxs-star"></i></span>
                </div>
              </div>

              <p>
                “Having good restaurant reviews is crucial these days. It is not
                just making our decision to pick one easier, it is also helping
                the restaurant be more successful. You can quickly copy and
                paste these good restaurant review examples, publish them on
                Facebook”
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=============== App ===============-->
    <section class="section app">
      <div class="row container">
        <div class="col">
          <div class="circle">
            <div class="inner-circle"></div>
            <img src="./images/mobile.png" alt="" />
          </div>
        </div>
        <div class="col">
          <h2>
            Never Feel Hungry! Download Our Mobile App Order Delicious Food
          </h2>
          <p>
            Online ordering has enabled many restaurants to manage their peak
            business hours very effectively.
          </p>
          <div class="d-flex">
            <img src="./images/app-store.png" alt="" />
            <img src="./images/google-play.png" alt="" />
          </div>
        </div>
      </div>
    </section>
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
            {{-- <a href="">All Products</a>
            <a href="">Locations Map</a> --}}
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
