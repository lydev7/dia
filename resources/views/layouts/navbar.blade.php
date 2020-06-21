<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light layout-navbar-fixed navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Account</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-user-alt mr-2"></i> Profile
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-cog mr-2"></i> Params
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button href="#" class="dropdown-item" type="submit">
                        <i class="fas fa-power-off mr-2"></i> Disconnect
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
