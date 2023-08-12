<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestion Facture</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- End layout styles -->
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="/assets/images/webmarko.jpeg"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                {{-- <img src="data:image/png;base64,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" alt="image">
                                <span class="availability-status online"></span> --}}
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <div class="dropdown-divider"></div>
                            {{-- <a class="dropdown-item" href="#"> --}}
                                {{-- <i class="mdi mdi-logout me-2 text-primary"></i> Se déconnecter </a> --}}

                                <a class="dropdown-item" href="/profile">
                                    <i class="mdi mdi-account-circle me-2 text-primary"></i> {{ __('Profile') }}
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="dropdown-item" href="route('login')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();"><i class="mdi mdi-logout me-2 text-primary"></i>
                                        {{ __('Se déconnecter') }}
                                    </a>
                                </form>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>

                    {{-- <li class="nav-item nav-logout d-none d-lg-block">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="dropdown-item" href="route('login')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();"><i
                                        class="mdi mdi-power"></i>
                                    {{ __('') }}
                                </a>
                            </form>

                    </li> --}}

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="data:image/png;base64,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" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">Gestion Facture</span>
                                <span class="text-secondary text-small">Admin</span>
                            </div>
                            {{-- <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> --}}
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <span class="menu-title">Basic UI Elements</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/buttons.html">Buttons</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/typography.html">Typography</a></li>
                            </ul>
                        </div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboarde') }}">
                          <span class="menu-title">Dashboard</span>
                          <i class="mdi mdi-home menu-icon"></i>
                        </a>
                      </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('client') }}">
                            <span class="menu-title">Clients</span>
                            <i class="mdi mdi-contacts menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('devis') }}">
                            <span class="menu-title">Devis</span>
                            <i class="mdi mdi-content-save-all menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('facture') }}">
                            <span class="menu-title">Factures</span>
                            <i class="mdi mdi-chart-bar menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('service') }}">
                            <span class="menu-title">Service</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('sweetalert::alert')
                    @yield('content')
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/assets/js/off-canvas.js"></script>
    <script src="/assets/js/hoverable-collapse.js"></script>
    <script src="/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/assets/js/dashboard.js"></script>
    <script src="/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
