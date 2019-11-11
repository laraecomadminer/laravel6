<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin</title>
  <link rel="stylesheet" href="{{asset('node_modules/font-awesome/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}" />
  <link rel="stylesheet" href="{{asset('node_modules/flag-icon-css/css/flag-icon.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/app.css') }}" />
  <link rel="stylesheet" href="{{asset('css/admin_style.css') }}" />
  <link rel="shortcut icon" href="{{asset('images/favicon.png') }}" />
</head>

<body>
  <div class=" container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('images/logo_star_black.png') }}" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('images/logo_star_mini.jpg')}}" alt=""></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
		
		<!----------search search search------>
        <form class="form-inline mt-2 mt-md-0 d-none d-lg-block" action="/admin/product/search" method="get">
          <input class="form-control mr-sm-2 search" type="text" name="search" placeholder="Search">
		  
			<button class="btn btn-outline-secondary" type="submit" id="button-addon2">
			<i class="fa fa-search"></i></button>
        </form>
		
        <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
          <li class="nav-item">
            <a class="nav-link profile-pic" href="#"><img class="rounded-circle" src="{{asset('images/face.jpg')}}" alt=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-th"></i></a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <img src="{{asset('images/yeasin.jpg') }}" alt="">
            <p class="name">Yeasin</p>
            <p class="designation">Manager</p>
            <span class="online"></span>
          </div>
          <ul class="nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('index')}}">
                <img src="{{asset('images/icons/1.png') }}" alt="">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#sample-pages" aria-expanded="false" aria-controls="sample-pages">
                <img src="{{asset('images/icons/9.png') }}" alt="">
                <span class="menu-title">Product Manage<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="sample-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.products')}}">
                      Manage Product
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.product.create')}}">
                      Create Product
                    </a>
                  </li>
                </ul>
              </div>
            </li>
			
				<li class="navS-item">
              <a class="nav-link" data-toggle="collapse" href="#category-pages" aria-expanded="false" aria-controls="category-pages">
                <img src="{{asset('images/icons/9.png') }}" alt="">
                <span class="menu-title">Category Manage<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="category-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.categories')}}">
                      Manage Category
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.category.create')}}">
                      Add Category
                    </a>
                  </li>
                </ul>
              </div>
            </li>
			<!------>
			<li class="navB-item">
              <a class="nav-link" data-toggle="collapse" href="#brand-pages" aria-expanded="false" aria-controls="brand-pages">
                <img src="{{asset('images/icons/9.png') }}" alt="">
                <span class="menu-title">brand Manage<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="brand-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.brands')}}">
                      Manage brand
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.brand.create')}}">
                      Add brand
                    </a>
                  </li>
                </ul>
              </div>
            </li>
			<!------>
			<li class="navD-item">
              <a class="nav-link" data-toggle="collapse" href="#division-pages" aria-expanded="false" aria-controls="division-pages">
                <img src="{{asset('images/icons/9.png') }}" alt="">
                <span class="menu-title">Division Manage<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="division-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.divisions')}}">
                      Manage Division
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.division.create')}}">
                      Add Division
                    </a>
                  </li>
                </ul>
              </div>
            </li>
			<!------>
			<li class="navDis-item">
              <a class="nav-link" data-toggle="collapse" href="#district-pages" aria-expanded="false" aria-controls="district-pages">
                <img src="{{asset('images/icons/9.png') }}" alt="">
                <span class="menu-title">District Manage<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="district-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.districts')}}">
                      Manage District
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.district.create')}}">
                      Add District
                    </a>
                  </li>
                </ul>
              </div>
            </li>
			<!------>
			
            <li class="nav-item">
              <a class="nav-link" href="#">
                <img src="{{asset('images/icons/10.png') }}" alt="">
                <span class="menu-title">Settings</span>
              </a>
            </li>
          </ul>
        </nav>

        <!-- partial -->
        <div class="content-wrapper"> 
		  
		  @include('admin.partials.message')
          @yield('content')
		  
       </div> 
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">Yeasin-arafat</a> &copy; 2019
            </span>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>

  </div>
  
  <script src="{{asset('node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('node_modules/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/misc.js')}}"></script>
  <script src="{{asset('js/chart.js')}}"></script>
  <script src="{{asset('js/maps.js')}}"></script>  
</body>

</html>
