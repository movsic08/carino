<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <a href="#"><img src="assets/img/logo-2.png" class="logo-icon" alt="logo icon"></a>
            </div>
            <div>
                <a href="#">
                    <h2 class="logo-text">FPOP<p>Pangasinan Chapter</p></h2>
                </a>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-menu'></i></div>
        </div>

        
        @php
        $id = Auth::user()->id;
        $staffId = App\Models\User::find($id);
        $status = $staffId->status;
        @endphp

        <!-- navigation -->
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{route('staff.dashboard')}}">
                    <div class="parent-icon"><i class='bx bx-category'></i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            @if($status === 'active')
            <li class="menu-label">Components</li>
            <li>
                <a href="{{ route('staff.live.chat') }}">
                    <div class="parent-icon"><i class='bx bx-category'></i></div>
                    <div class="menu-title">Live Chat</div>
                </a>
            </li>
            <li class="menu-label">Organization</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-group'></i></div>
                    <div class="menu-title">Clients</div>
                </a>
                <ul>
                    <li><a href="{{ route('staff.client.directory') }}"><i class='bx bx-folder-open'></i>View Clients</a></li>
                    <li><a href="{{ route('staff.add.client') }}""><i class='bx bx-user-plus'></i>Register New Client</a></li>
                    <br>
                    <li><a href="{{ url('staff/manage-client-directory') }}"><i class='bx bx-list-check'></i>Manage Clients</a></li>
                    <li><a href="{{ url('staff/deleted-clients') }}"><i class='bx bx-trash'></i>Deleted Clients</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-book-alt'></i></div>
                    <div class="menu-title">Assessments</div>
                </a>
                <ul>
                    <li><a href="{{ url('staff/assessment-directory') }}"><i class='bx bx-list-check'></i>View Assessment</a></li>
                    <li><a href="{{ url('staff/manage-assessments') }}"><i class='bx bx-list-check'></i>Manage Assessments</a></li>
                    <br>
                    <li><a href="{{ url('staff/deleted-assessments') }}"><i class='bx bx-trash'></i>Deleted Assessments</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;"  style="display: none;">
                    <div class="parent-icon"><i class='bx bx-calendar-event'></i></div>
                    <div class="menu-title">Events</div>
                </a>
                <ul>
                    <li><a href="#"><i class='bx bxs-calendar-star'></i>Calendar</a></li>
                    <li><a href="#"><i class='bx bx-calendar-plus'></i>Add New Event</a></li>
                    <li><a href="#"><i class='bx bxs-calendar-edit'></i>View Events</a></li>
                </ul>                
            </li>

              
            
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-file'></i></div>
                    <div class="menu-title">Schedule</div>
                </a>
                <ul>
                    <li><a href="{{ route('staff.schedule.request') }}"><i class='bx bx-list-ul' ></i>Schedule Request</a></li>
                    <li><a href="{{ url('staff/appointments/approved') }}"><i class='bx bx-check-square'></i>Approved</a></li>
                    <li><a href="{{ url('staff/appointments/rejected') }}"><i class='bx bx-message-square-x'></i>Rejected</a></li>
                </ul>
            </li> 
            
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-folder"></i></div>
                    <div class="menu-title">Reports</div>
                </a>
                <ul>
                    <!-- Add submenu items for Reports if needed -->
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-chart"></i></div>
                    <div class="menu-title">Data Analytics</div>
                </a>
                <ul>
                    <!-- Add submenu items for Data Analytics if needed -->
                </ul>
            </li>
            @else

            @endif  
        </ul>
        <!-- end navigation -->
    </div>
    <!-- end left sidebar -->
</div>