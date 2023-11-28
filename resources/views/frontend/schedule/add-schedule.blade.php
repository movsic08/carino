@extends('frontend.frontend-dashboard')
@section('main')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


   <!--Page Title-->
       
        <!--End Page Title-->


        <!-- property-details -->
        <section class="property-details property-details-one">
            <div class="auto-container">

                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-details-content">

 
                            
                            <div class="schedule-box content-widget">
                                <div class="title-box">
                                    <h4>Schedule A Visit</h4>
                                </div>
                                <div class="form-inner">
                                    <form action="{{ route('store.schedule') }}" method="post">
                                        @csrf 
                            
                                        <div class="row clearfix">     
                            
                                            <div class="col-lg-6 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <i class="far fa-calendar-alt"></i>
                                                    <input type="text" name="visit_date" placeholder="Visit Date" id="datepicker">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <i class="far fa-clock"></i>
                                                    <input type="text" name="visit_time" placeholder="Visit Time" id="visit-time-input">
                                                    <p id="time-validation-message" style="color: red;"></p>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <textarea name="message" placeholder="Your message"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="form-group message-btn">
                                                    <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>


                </div>


            </div>
        </section>
        <!-- property-details end -->


        <!-- subscribe-section -->
        <!-- subscribe-section end -->


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

        <script>
            document.getElementById('visit-time-input').addEventListener('blur', function() {
                var inputTime = this.value;
                var isValidTime = validateTime(inputTime);
        
                if (!isValidTime) {
                    document.getElementById('time-validation-message').textContent = 'Time is not available.';
                } else {
                    document.getElementById('time-validation-message').textContent = '';
                }
            });
        
            function validateTime(time) {
                // Convert the time to a Date object for easy comparison
                var date = new Date('2023-01-01 ' + time);
                
                // Define the allowed time ranges (9 AM to 12 PM and 1 PM to 3 PM)
                var morningStart = new Date('2023-01-01 09:00:00');
                var morningEnd = new Date('2023-01-01 12:00:00');
                var afternoonStart = new Date('2023-01-01 13:00:00');
                var afternoonEnd = new Date('2023-01-01 15:00:00');
                
                // Check if the entered time is within the allowed ranges
                if ((date >= morningStart && date <= morningEnd) || (date >= afternoonStart && date <= afternoonEnd)) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
@endsection