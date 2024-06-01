<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECommerce-ShoppingCart | Korsat X Parmaga</title>

      <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets_makan/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets_makan/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- box icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- styles  -->
    <link rel="stylesheet" href="assets_makan/css/makans.css">
</head>

<body>
    <!-- HEADER  -->
    <header>
        <!-- NAV  -->
        <div class="nav container">
            <a href="" class="logo"><span>HANS</span> Restaurants</a>
          
            <!-- CART ICON  -->
            <i class='bx bx-shopping-bag' id="cart-icon"></i>

            <!-- CART  -->
            <div class="cart">
                <h2 class="cart-title">Your Cart</h2>

                <!-- CONTENT  -->
                <div class="cart-content">

                </div>

                <!-- TOTAL   -->
                <div class="total">
                    <div class="total-title">Total</div>
                    <div class="total-price">Rp0</div>
                </div>
                <!-- BUY BUTTON  -->
                <button type="button" class="btn-buy">Buy Now</button>
                <!-- CART CLOSE  -->
                <i class='bx bx-x' id="cart-close"></i>
            </div>
        </div>
    </header>


    <!-- SHOP SECTION  -->
    <section class="shop container">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
        </div>
        <h2 class="section-title">Shop Products</h2>
        <section id="menu" class="menu section-bg">
            <div class="container" data-aos="fade-up">
              <div class="section-title">
                <h2>Menu</h2>
                <p>Check Our Tasty Menu</p>
              </div>
        
        <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
                <li data-filter="*" class="filter-active">All</li>
                <!-- filter berdasarkan category pada model product -->
                @forelse(\App\Models\Product::CATEGORY_SELECT as $key => $value)
                    <li data-filter=".filter-{{ strtolower(str_replace(' ', '-', $key)) }}">{{ $value }}</li>
                @empty
                    <li>{{ trans('panel.frontend.menu.if_error_category') }}</li>
                @endforelse
            </ul>
        </div>
    </div>
      <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
        @forelse ($productsss as $p)
            <div class="col-lg-6 menu-item filter-{{ strtolower(str_replace(' ', '-', $p->category)) }}">
              <img src="{{ $p->getFirstMediaUrl('image', 'preview') }}" class="menu-img" alt="{{ $p->name }}"/>
              <div class="menu-content">
                <a href="#">{{ $p->name }}</a><span>Rp.{{$p->price}}</span>
              </div>
              <div class="menu-ingredients">
                {{$p->description}}
              </div>
            </div>
        @empty
            <div class="col-lg-12">
                <p>{{ trans('panel.frontend.menu.if_error_menu') }}</p>
            </div>
        @endforelse
      </div>
            </div>
          </section>


<!-- CONTENT -->
<div class="shop-content">
    <div class="product-wrapper">
        @foreach ($productsss as $pp)
        <!-- BOX LOOPING -->
        <div class="product-box">
            <img src="{{ $pp->getFirstMediaUrl('image', 'preview') }}" alt="{{ $pp->name }}" class="product-img">
            <div class="product-details">
                <h2 class="product-title">{{ $pp->name }}</h2>
                <span class="product-price">{{ $pp->price }}</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
        </div>
        @endforeach
    </div>
</div>

    </section>
    <script src="assets_makan/js_makan/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
    <!-- Vendor JS Files -->
    <script src="assets_makan/js_makan/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets_makan/js_makan/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <!-- link js  -->
    <script src="assets_makan/js_makan/mains.js"></script>
</body>

</html>