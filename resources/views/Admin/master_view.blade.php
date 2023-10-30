<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.min.css" />
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" /> --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/style.css" />
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/mystyle.css" />
  <link rel="stylesheet" href="{{ URL::to('/') }}/js/sweetalert.min.js" />
  <script src="{{ URL::to('/') }}/js/sweetalert.min.js"></script>
  <title>Admin Header</title>

</head>

<body>
  <!-- top navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #000000;">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
        aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <a href=""><img src="{{ URL::to('/') }}/pictures/Logo/logo.png" alt="" height="45px" width="45" style="margin-left: 20px"></a>

      <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">
        <div class="textt">Admin Dashboard</div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
        aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="topNavBar">
        <form class="d-flex ms-auto my-3 my-lg-0">
          <div class="input-group">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-primary" type="submit">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="bi bi-person-fill"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ URL::to('/') }}/admin_profile">View Profile</a></li>
              <li><a class="dropdown-item" href="{{ URL::to('/') }}/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- top navigation bar -->
  <!-- offcanvas -->
  <div class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <li>
            <a href="#" class="nav-link px-3 active" style="color: rgb(255, 255, 255)">
              <span class="me-2"><i class="bi bi-speedometer2"></i></span>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <!-- <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
              <span class="me-2"><i class="bi bi-layout-split"></i></span>
              <span>Layouts</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="#" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                    <span>Dashboard</span>
                  </a>
                </li>
              </ul>
            </div>
          </li> -->
          <li>
            <a href="{{ URL::to('/') }}/admin_dashboard" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-house-door-fill"></i></span>
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/users_admin" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-person-check-fill"></i></span>
              <span>Admins</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/users_normal" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-person-circle"></i></span>
              <span>Normal Users</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/users_total" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-person-fill"></i></span>
              <span>Total Users</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/movies" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-film"></i></span>
              <span>Movies</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/movies_upcoming" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-film"></i></span>
              <span>Upcoming Movies</span>
            </a>
          </li>
          {{-- <li>
            <a href="{{ URL::to('/') }}/movies_top" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-film"></i></span>
              <span>Top Grossing Movies</span>
            </a>
          </li> --}}
          <li>
            <a href="{{ URL::to('/') }}/products" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-cart-fill"></i></span>
              <span>Products</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/tickets" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-ticket"></i></span>
              <span>Booked Tickets</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/coupon" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-gift-fill"></i></span>
              <span>Coupons</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/orders" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-cart-check-fill"></i></span>
              <span>Orders</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/review_rating" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-star-fill"></i></span>
              <span>Review & Rating</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/products_deleted" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-trash"></i></span>
              <span>Deleted Products</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/users_deleted" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-trash"></i></span>
              <span>Deleted Users</span>
            </a>
          </li>
          <li>
            <a href="{{ URL::to('/') }}/messages" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-chat-dots-fill"></i></span>
              <span>Messages</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- offcanvas -->
  <!-- Content -->
      @yield('content')
  <!-- End Content -->

  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>
