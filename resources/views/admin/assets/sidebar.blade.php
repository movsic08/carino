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
        <!-- navigation -->
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{url('admin/dashboard')}}">
                    <div class="parent-icon"><i class='bx bx-category'></i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            
            <li class="menu-label">Components</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-group'></i></div>
                    <div class="menu-title">Clients</div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.client.directory') }}"><i class='bx bx-folder-open'></i>View Clients</a></li>
                    <li><a href="{{ route('admin.add.client') }}""><i class='bx bx-user-plus'></i>Register New Client</a></li>
                    <br>
                    <li><a href="{{ url('admin/manage-client-directory') }}"><i class='bx bx-list-check'></i>Manage Clients</a></li>
                    <li><a href="{{ url('admin/deleted-clients') }}"><i class='bx bx-trash'></i>Deleted Clients</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-book-alt'></i></div>
                    <div class="menu-title">Assessments</div>
                </a>
                <ul>
                    <li><a href="{{ url('admin/assessment-directory') }}"><i class='bx bx-list-check'></i>View Assessment</a></li>
                    <li><a href="{{ url('admin/manage-assessments') }}"><i class='bx bx-list-check'></i>Manage Assessments</a></li>
                    <br>
                    <li><a href="{{ url('admin/deleted-assessments') }}"><i class='bx bx-trash'></i>Deleted Assessments</a></li>
                </ul>
            </li>
            
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-box"></i></div>
                    <div class="menu-title">Inventory</div>
                </a>
                <ul>
                    <li><a href="{{ route('admin.inventory.manage') }}"><i class="bx bx-package"></i> Manage Inventory</a></li>
                    <li><a href="{{ route('admin.inventory.add') }}"><i class="bx bx-checkbox-checked"></i> Add Inventory Item</a></li>
                    <li><a href="{{ route('admin.inventory.deleted-items') }}"><i class="bx bx-trash"></i> Deleted Items</a></li>
                    <!-- Add more sublinks as needed -->
                </ul>
            </li>
            
            <li style="display: none;">
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-file'></i></div>
                    <div class="menu-title">Appointments</div>
                </a>
                <ul>
                    <li><a href="{{ url('admin/showappointment') }}"><i class='bx bx-list-ul' ></i>Pending Appointments</a></li>
                    <li><a href="{{ url('admin/appointments/approved') }}"><i class='bx bx-check-square'></i>Approved</a></li>
                    <li><a href="{{ url('admin/appointments/rejected') }}"><i class='bx bx-message-square-x'></i>Rejected</a></li>
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
            <li class="menu-label">Organization</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-user-circle'></i></div>
                    <div class="menu-title">Staff</div>
                </a>
                <ul>
                    <li><a href="{{route('add.staff')}}"><i class='bx bx-user-plus'></i>Add New Staff</a></li>
                    <li><a href="{{route('all.staff')}}"><i class='bx bx-list-ul'></i>All Staff</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-photo-album'></i></div>
                    <div class="menu-title">Blog</div>
                </a>
                <ul>
                    <li><a href="{{ route('all.blog.category') }}"><i class='bx bx-comment-detail'></i>All Blog Category</a></li>
                    <br>
                    <li> <a href="{{ route('all.post') }}"><i class='bx bx-comment-detail'></i>All Post</a></li>
                    <li><a href="{{ route('add.post') }}"><i class='bx bx-comment-detail'></i>Add Post</a></li>
                </ul>                
            </li>
            <li>
                <a href="{{ route('admin.blog.comment') }}" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-dots'></i></div>
                    <div class="menu-title">Blog Comment</div>
                </a>
            </li>
            <li>
                <a href="{{ route('smtp.setting') }}" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-envelope'></i></i></div>
                    <div class="menu-title">SMTP Settings</div>
                </a>     
            </li>
            <li style="display: none;">
                <a class="has-arrow" href="javascript:;">
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
                    <div class="parent-icon"><i class="bx bx-box"></i></div>
                    <div class="menu-title">Role & Permission</div>
                </a>
                <ul>
                    <li><a href="{{route('all.permission')}}"><i class='bx bx-block'></i>All Permission</a></li>
                    <li><a href="{{route('all.roles')}}"><i class='bx bx-user-plus' ></i>All Roles</a></li>
                    <li><a href="{{ route('add.roles.permission') }}"><i class='bx bx-user-pin'></i>Role in Permission</a></li>
                    <li><a href="{{ route('all.roles.permission') }}"><i class='bx bx-key'></i>All Role in Permission</a></li>
                    <!-- Add more sublinks as needed -->
                </ul>
            </li>  
        </ul>
        <!-- end navigation -->
    </div>
    <!-- end left sidebar -->
</div>
