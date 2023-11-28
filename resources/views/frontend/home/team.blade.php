@php
$staffs = App\Models\User::where('status','active')->where('role','staff')->orderBy('id','DESC')->limit(5)->get();
 @endphp

 <section class="team-section sec-pad centred bg-color-1">
            <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-1.png') }});"></div>
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Our Staffs</h5>
                    <h2>Meet Our Excellent Staffs</h2>
                </div>
                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                    

  @foreach($staffs as $item)
    <div class="team-block-one">
        <div class="inner-box">
            <figure class="image-box"><img src="{{ (!empty($item->photo)) ? url('upload/staff_images/'.$item->photo) : url('upload/no_image.jpg') }}" alt="" style="width:370px; height:370px;" ></figure>
            <div class="lower-content">
                <div class="inner">
                    <h4><a href="{{ route('staff.details',$item->id) }}">{{ $item->name }}</a></h4>
                    <span class="designation">{{ $item->email }}</span>
                    <ul class="social-links clearfix">
                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
     @endforeach               
                     
                </div>
            </div>
        </section>