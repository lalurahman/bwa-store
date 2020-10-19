<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
    @stack('addon-style')

  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img
              src="/images/admin.png"
              alt="logo"
              class="my-4"
              style="max-width: 150px"
            />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{ route('dashboard-admin') }}"
              class="list-group-item list-group-item-action {{ (request()->is('admin')) ? 'active' : '' }}"
              >Dashboard</a
            >
            <a
              href="#"
              class="list-group-item list-group-item-action {{ (request()->is('admin/products*')) ? 'active' : '' }}"
              >Products</a
            >
            <a
              href="{{ route('category.index') }}"
              class="list-group-item list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : '' }}"
              >Categories</a
            >
            <a
              href="#"
              class="list-group-item list-group-item-action"
              >Transactions</a
            >
            <a
              href="#"
              class="list-group-item list-group-item-action"
              >Users</a
            >
            <a
              href="{{ route('dashboard-settings-store') }}"
              class="list-group-item list-group-item-action"
              >Store Settings</a
            >
            <a
              href="{{ route('dashboard-settings-account') }}"
              class="list-group-item list-group-item-action"
              >My Account</a
            >
          </div>
        </div>
        <!-- page content -->
        <div id="page-content-wrapper">
          <!-- navbar -->
          <nav
            class="navbar navbar-expand-lg navbar-light navbar-store fixed-top"
            data-aos="fade-down"
          >
            <div class="container-fluid">
              <button
                class="btn btn-secondary d-md-none mr-auto mr-2"
                id="menu-toggle"
              >
                &laquo; Menu
              </button>
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- desktop -->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                  <li class="nav-item dropdown">
                    <a
                      href="#"
                      class="nav-link"
                      role="button"
                      id="navbarDropdown"
                      data-toggle="dropdown"
                    >
                      <img
                        src="/images/icon-user.png"
                        alt="profile"
                        class="rounded-circle mr-2 profile-picture"
                      />
                      Hi, Lalu
                    </a>
                    <div class="dropdown-menu">
                      
                      <a href="#" class="dropdown-item">Logout</a>
                    </div>
                  </li>
                  
                </ul>
                <!-- mobile -->
                <ul class="navbar-nav d-block d-lg-none">
                  <li class="nav-item">
                    <a href="#" class="nav-link">Hi, Lalu</a>
                  </li>
                
                </ul>
              </div>
            </div>
          </nav>

          @yield('content')
          
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    @stack('addon-script')

  </body>
</html>
