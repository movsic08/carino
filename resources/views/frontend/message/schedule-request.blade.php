@extends('frontend.frontend-dashboard')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>



        <!-- sidebar-page-container -->
        <section class="sidebar-page-container blog-details sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    



          @php

            $id = Auth::user()->id;
            $userData = App\Models\User::find($id); 
        @endphp




        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
            <div class="blog-sidebar">
              <div class="sidebar-widget post-widget">
                    <div class="widget-title">
                        <h4>User Profile </h4>
                    </div>
                    <div class="post-inner">
                        <div class="post">
                            <figure class="post-thumb"><a href="blog-details.html">
        <img src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('upload/no_image.jpg') }}" alt=""></a></figure>
        <h5><a href="blog-details.html">{{ $userData->name }} </a></h5>
         <p>{{ $userData->email }} </p>
                        </div> 
                    </div>
                </div> 
       
        <div class="sidebar-widget category-widget">
            <div class="widget-title">
               
            </div>
             

     @include('frontend.dashboard.dashboard-sidebar')


          </div> 
                         
                        </div>
                    </div>




  <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="news-block-one">
                                <div class="inner-box">
                                    
                                    <div class="lower-content">
                                        
                                         
                                      
                                        <table class="table table-striped">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Status</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($srequest as $key => $item)
                                              <tr>
                                                <th scope="row">{{ $key+1 }}</th>
                                                <td>{{ $item->visit_date }}</td>
                                                <td>{{ $item->visit_time }}</td>
                                                <td>
                                                    @if($item->status == 1)
                                                    <span class="badge rounded-pill bg-success">Confirm</span>
                                          
                                                    @else
                                                 <span class="badge rounded-pill bg-danger">Pending</span>
                                                    @endif
                                                </td>
                                              </tr>
                                              @endforeach
                                            </tbody>
                                          </table>


 

                                    </div>
                                </div>
                            </div>
                             
                            
                        </div>

 
                    </div> 


                </div>
            </div>
        </section>
        <!-- sidebar-page-container -->



        @endsection