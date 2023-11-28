@extends('frontend.frontend-dashboard')
@section('main')


  <!--Page Title-->
           <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});"></div>
                <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});"></div>
            </div> 
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>{{ $staff->name }}</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>{{ $staff->name }}</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- Staff-details -->
<!-- Staff-details -->
<section class="agent-details">
    <div class="auto-container">
        <div class="agent-details-content">
            <div class="agents-block-one">
                <div class="inner-box mr-0">
                    <figure class="image-box"><img src="{{ (!empty($staff->photo)) ? url('upload/staff_images/'.$staff->photo) : url('upload/no_image.jpg') }}" alt="" style="width:270px; height:330px;"></figure>
                    <div class="content-box">
                        <div class="upper clearfix">
                            <div class="title-inner pull-left">
                                <h4>{{ $staff->name }}</h4>
                                <span class="designation">Staff (ID: {{ $staff->id }})</span>
                            </div>
                            <ul class="social-list pull-right clearfix">
                                <li><a href="agents-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="agents-details.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="agents-details.html"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="text">
                            <p>Success isn’t really that difficult. There is a significant portion of the population here in North America, that actually want and need success to be hard! Why? So they then have a built-in excuse.when things don’t go their way! Pretty sad situation, to say the least. Have some fun and hypnotize yourself to be your very own Ghost of Christmas future”</p>
                        </div>
                        <ul class="info clearfix mr-0">
                            <li><i class="fab fa fa-envelope"></i><a href="mailto:bean@realshed.com">{{ $staff->email }}</a></li>
                            <li><i class="fab fa fa-phone"></i><a href="tel:03030571965">{{ $staff->phone }}</a></li>
                        </ul>

                        @auth
                        <div id="app">
                            <!-- Pass staff ID as prop to send-message component -->
                            <send-message :receiverid="{{ $staff->staff_id }}" receivername="{{ $staff->name }}"></send-message>

                        </div>
                        @else
                        <span class="text-danger">For Chat Login First </span>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Staff-details end -->



@endsection