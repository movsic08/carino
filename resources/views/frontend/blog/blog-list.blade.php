@extends('frontend.frontend-dashboard')
@section('main')

@section('title')
  Blog | Easy RealEstate  
@endsection

<style>
    .smaller-button {
    font-size: 14px; /* Adjust the font size as needed */
    /* You can add more styling properties here, such as padding, margin, etc. */
}
.section-with-border {
    border: 1px solid #ccc;
}
</style>

 <!--Page Title-->
       <section class="page-title-two bg-color-1 centred">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});"></div>
                <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});"></div>
            </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1> Blog  </h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Blog </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- sidebar-page-container -->
<section class="sidebar-page-container blog-grid sec-pad-2 section-with-border">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                <div class="blog-grid-content">
                    <div class="row clearfix">

                        @foreach($blog as $item)
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><a href="{{ url('blog/details/'.$item->post_slug) }}"><img src="{{ asset($item->post_image) }}" alt=""></a></figure>
                                            <span class="category">Featured</span>
                                        </div>
                                        <div class="lower-content">
                                            <h4><a href="{{ url('blog/details/'.$item->post_slug) }}">{{ $item->post_title }}</a></h4>
                                            <ul class="post-info clearfix">
                                                <li class="author-box">
                                                    <figure class="author-thumb"><img src="{{ (!empty($item->user->photo)) ? url('upload/admin_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt=""></figure>
                                                    <h5><a href=" ">{{ $item['user']['name'] }}</a></h5>
                                                </li>
                                                <li>{{ $item->created_at->format('M d Y') }}</li>
                                            </ul>
                                            <div class="text" style="max-height: 100px; overflow: hidden;">
                                                <p>{{ $item->short_descp }}</p>
                                            </div>
                                            <div class="btn-box">
                                                <a href="{{ url('blog/details/'.$item->post_slug) }}" class="btn theme-btn btn-two btn-sm">See Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="pagination-wrapper">
                        <ul class="pagination clearfix">
                            <li><a href="blog-1.html" class="current">1</a></li>
                            <li><a href="blog-1.html">2</a></li>
                            <li><a href="blog-1.html">3</a></li>
                            <li><a href="blog-1.html"><i class="fas fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- sidebar-page-container -->



@endsection