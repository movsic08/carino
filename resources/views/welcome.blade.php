<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="icon" href="assets/img/logo-2.png" type="image/png">

  <base href="/public">
  <title>FPOP Pangasinan Chapter</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="../assets/css/maicons.css">
  <link rel="stylesheet" href="../assets/css/theme2.css">
  <link rel="stylesheet" href="assets/css/loading.css" />
  

  <style>
    .page-hero {
        background-image: url('../../assets/images/bg/bg_image_1.jpg');
        width: 100%;
        height: calc(100vh - 60px);
        background-size: cover;
        animation: slide 5s infinite;
    }

    .custom-swal-popup {
    width: 250px;
    }

    .custom-swal-title {
        color: #007bff;
    }

    .custom-swal-content {
        color: #000;
    }

    .custom-swal-confirm-button {
        background-color: #007bff !important; 
        color: #fff; 
    }

  </style>

  
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    @include('assets.navbar')
  </header>

  <div class="page-hero bg-image overlay-dark">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Family Planning Organization of the Philippines</span>
        <h1 class="display-4">Pangasinan</h1>
        <a href="#appoinment" class="btn btn-info">Let's Consult</a>
      </div>
    </div>
  </div>

  <div class="page-section pb-0">
    <div class="container">
      <div class="row align-items-center mt-5">
        <div class="col-lg-6 col-12 py-3 wow fadeInUp text-center">
          <h1 class="display-4 font-weight-bold mb-5">Welcome to FPOP</h1>
          <p class="text-grey mb-4">We are a service-oriented organization providing sexual and reproductive services to all the Filipinos, especially the poor, marginalized, socially excluded and underserved.</p>
          <a href="{{url('about')}}" class="btn btn-info">Learn More</a>
        </div>
        <div class="col-lg-6 col-12 wow fadeInRight" data-wow-delay="400ms">
          <div class="img-place custom-img-1 text-center mb-4">
            <img src="assets/images/logo-2.png" alt="">
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->


  <div class="page-section" id="appointment">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
  
      <form class="main-form mx-auto text-center" action="{{url('appointment')}}" method="POST">
        @csrf
        <div class="row mt-5">
          <div class="col-12 col-sm-12 py-2 wow fadeInLeft">
            <label for="name">Your Name:</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="name" id="name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <label for="email">Email Address:</label>
            <input type="text" class="form-control" placeholder="Email address.." name="email" id="email">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="phone">Contact Number:</label>
            <input type="number" class="form-control" placeholder="Contact Number" name="phone" id="phone">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="date">Date:</label>
            <input type="date" class="form-control" name="date" id="date">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="time">Time:</label>
            <input type="time" class="form-control" name="time" id="time">
          </div>
  
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <label for="message">Message:</label>
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>
  
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div>
  

<!-- Footer -->
@include('assets.footer')

<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="../assets/vendor/wow/wow.min.js"></script>
<script src="../assets/js/theme.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/loading.js"></script>

<!-- Include SweetAlert CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@if(session('success') || session('error'))
    <script>
        @if(session('success'))
            Swal.fire({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp animate__faster'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown animate__faster'
                },
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    content: 'custom-swal-content'
                },
                background: '#222',
                iconColor: '#28a745', 
                confirmButtonColor: '#28a745', 
                confirmButtonClass: 'custom-swal-confirm-button'
            });
        @elseif(session('error'))
            Swal.fire({
                title: 'Error',
                text: '{{ session('error') }}',
                icon: 'error',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp animate__faster'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutDown animate__faster'
                },
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    content: 'custom-swal-content'
                },
                background: '#222',
                iconColor: '#dc3545',
                confirmButtonColor: '#dc3545',
                confirmButtonClass: 'custom-swal-confirm-button'
            });
        @endif
    </script>
@endif


</body>
</html>