@extends('admin.admin-layout')

<style type="text/css">
    .ck-editor__editable_inline
    {
        height: 300px;
    }    
</style>
@section('admin')
     <!-- Breadcrumb -->
     <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Event</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Event Information</li>
                </ol>
            </nav>
        </div>
    </div>
    <hr>

    <!-- Card -->
    <div class="card">
        <div class="card-body">
            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="container">
                    <div class="row mb-3">
                        <div class="col-2">
                            <button class="btn btn-sm" onclick="goBack()" style="background: none; border: none;" aria-label="Go Back">
                            <i class="fas fa-arrow-left fa-2xs"></i></i>
                            </button>
                        </div>
                        <div class="col-8 text-center">
                            <h5 class="text-uppercase"><strong>Add Event/Activity</strong></h5>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>

                <hr>

                <form action="{{ route('store-event') }}" method="post">
                    @csrf
                
                    <div class="card bg-light">
                        <div class="card-body">
                
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter title">
                                    </div>
                                </div>
                            </div>
                
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description...">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="participants">Participants</label>
                                        <input type="text" class="form-control" id="participants" name="participants" value="{{ old('participants') }}" placeholder="Enter participants">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="event_location">Event Location</label>
                                        <input type="text" class="form-control" id="event_location" name="event_location" value="{{ old('event_location') }}" placeholder="Enter event location">
                                    </div>
                                </div>
                            </div>
                
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="start_date">Start Date</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                    </div>
                                </div>
                
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="end_date">End Date</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}">
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </div>
                
                    <hr>
                
                    <div class="row mb-3">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                
                </form>
                
                
            </div>
        </div>
    </div>





    <!-- Custom Scripts -->
    <script src="assets/js/multi-tab-form.js"></script>
    <script src="assets/js/form-interactions.js"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/43.0.1/classic/ckeditor.js"></script>
    <script src="/public/ckeditor/ckeditor.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <script>
        ClassicEditor.create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>    
@endsection