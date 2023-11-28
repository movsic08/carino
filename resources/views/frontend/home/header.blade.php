@php
$setting = App\Models\SiteSetting::find(1);
@endphp
<style>
.login-button a {
    background-color: #1c91e4;
    color: #ffffff; 
    padding: 0;
    border-radius: 5px; 
    display: inline-block;
    text-decoration: none;
}

.login-button a:hover {
    background-color: #1c2731;
}

.login-button a span {
    padding: 15px 15px;
}
</style>

<header class="main-header">
<!-- header-lower -->
<div class="header-lower">
<div class="outer-box">
<div class="main-box">
<div class="logo-box">
 <figure class="logo"><a href="{{ url('/') }}"><img src="{{ asset($setting->logo) }}" alt=""></a></figure>
</div>
<div class="menu-area clearfix">
 <!--Mobile Navigation Toggler-->
 <div class="mobile-nav-toggler">
     <i class="icon-bar"></i>
     <i class="icon-bar"></i>
     <i class="icon-bar"></i>
 </div>
 <nav class="main-menu navbar-expand-md navbar-light">
     <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
         <ul class="navigation clearfix">

  <li><a href="{{ url('/') }}"><span>Home</span></a> </li>
  <li><a href="{{ url('/about') }}"><span>About Us </span></a> </li>
       
  @auth
  <li><a href="{{ route('schedule') }}"><span>Schedule</span></a></li>
@endauth

<!-- Your other menu items -->
<li><a href="{{ route('blog.list') }}"><span>Blog</span></a></li>

@auth
    <li class="dashboard-button"><a href="{{ route('dashboard') }}"><span>Dashboard</span></a></li>
    <li class="login-button"><a href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span>Logout</span></a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endauth

@guest
    <li class="login-button"><a href="{{ route('login') }}"><span>Login</span></a></li>
@endguest



         </ul>
     </div>
 </nav>
</div>
<div class="btn-box">
 <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
</div>
</div>
</div>
</div>
     </header>