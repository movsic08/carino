@extends('admin.admin-layout')
@section('content')
<div class="container-fluid page-body-wrapper">

    <div class="container mt-5">

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Your Form</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('sendemail', $appointmentData->id) }}" method="POST">
                    @csrf
        
                    <div class="form-group">
                        <label for="greeting">Greetings</label>
                        <input type="text" class="form-control" id="greeting" name="greeting" value="Dear Client," required>
                    </div>
        
                    <div class="form-group">
                        <label for="number">Body</label>
                        <input type="text" class="form-control" id="number" name="number" value="Your appointment for {{ $appointmentData->date }} at {{ $appointmentData->time }} is approved." required>
                    </div>
                    
        
                    <div class="form-group">
                        <label for="actiontext">Action Text</label>
                        <input type="text" class="form-control" id="actiontext" name="actiontext" value="Go to website" required>
                    </div>
                    
        
                    <div class="form-group">
                        <label for="actionurl">Action Url</label>
                        <input type="text" class="form-control" id="actionurl" name="actionurl" value="http://www.fpoppangasinanchapter.org" required>
                    </div>
        
                    <div class="form-group">
                        <label for="endpart">End Part</label>
                        <input type="text" class="form-control" id="endpart" name="endpart" value="Thank you for choosing our Family Planning services. If you have any further questions, feel free to contact us." required>
                    </div>
                    
                    <hr>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i> Submit
                    </button>
                </form>
            </div>
        </div>
    
    </div>
</div>
@endsection