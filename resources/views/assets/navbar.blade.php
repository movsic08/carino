<style>
  .navbar {
    height: 50px;
  }
  .logo {
    max-width: 200px;
    max-height: 100px;
    width: auto;
    height: auto;
  }

  .zoomed {
    transform: scale(1.2);
  }
  .nav-link.active {
    color: blue;
  }

  .nav-link.active:hover {
    color: blue;
  }

  @media (min-width: 481px) and (max-width: 767px) {
    .navbar {
      height: 60px;
    }

    .logo {
      max-width: 150px;
      max-height: 75px;
    }

    .zoomed {
      transform: scale(1.1);
    }
    .navbar-nav {
      justify-content: flex-end;
    }

    .nav-link {
      font-size: 16px;
      flex: 0 0 auto;
    }

    .nav-link.active {
      color: blue;
      font-weight: bold;
    }

    .nav-link.active:hover {
      color: blue;
      font-weight: bold;
    }
    .nav-item.ml-lg-3 {
      margin-left: 0;
    }
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#"><img class="logo zoomed" src="assets/img/logo.png" alt="FPOP-Pangasinan Chapter"></a>
    <div class="collapse navbar-collapse" id="navbarSupport">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link{{ Request::is('/') ? ' active' : '' }}" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ Request::is('about') ? ' active' : '' }}" href="{{url('about')}}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ Request::is('contact') ? ' active' : '' }}" href="#footer">Contact</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-info ml-lg-3" href="{{route('login')}}">
                Login
            </a>
        </li>
      </ul>
    </div> <!-- .navbar-collapse -->
  </div> <!-- .container -->
</nav>