		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					  <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
						<input class="form-control px-5" type="search" placeholder="Search">
						<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i class='bx bx-search'></i></span>
					  </div>


					  <div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
							<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
								<a class="nav-link" href="javascript:;"><i class='bx bx-search'></i>
								</a>
							</li>

							<li class="nav-item dropdown dropdown-add">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
									<i class='bx bx-plus-circle'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end" style="width: fit-content; padding: 10px; margin: 5px;">
									<!-- Dropdown items -->
									<a class="dropdown-item d-flex align-items-center" href="javascript:;" style="font-size: 15px;">
										<i class='bx bx-xs bx-user' style="margin-right: 10px;"></i> Client
									</a>
									<a class="dropdown-item d-flex align-items-center" href="{{route('all.staff')}}" style="font-size: 15px;">
										<i class='bx bx-xs bx-user-circle' style="margin-right: 10px;"></i> Staff
									</a>
									<a class="dropdown-item d-flex align-items-center" href="{{ route('add.post') }}" style="font-size: 15px;">
										<i class='bx bx-xs bx-calendar' style="margin-right: 10px;"></i> Blog Post
									</a>
								</div>
							</li>
							
						
							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>

							<li class="nav-item dropdown dropdown-app" style="display: none;">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown" href="javascript:;"><i class='bx bx-grid-alt'></i></a>
								<div class="dropdown-menu dropdown-menu-end p-0 ">
									<div class="app-container p-2 my-2">
									  <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
										 
									 
										 
				
									  </div><!--end row-->
				
									</div>
								</div>
							</li>

				
							<li class="nav-item dropdown dropdown-large "  style="display: none;">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown"><span class="alert-count"></span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
								<div class="header-message-list">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-badge">8 New</p>
										</div>
									</a>
									<div class="header-notifications-list">
										
										
									</div>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<button class="btn btn-primary w-100">View All Notifications</button>
										</div>
									</a>
								</div>
							</li>
						</ul>
					</div>


					@php
						$id = Auth::user()->id;
						$profileData = App\Models\User::find($id); 
					@endphp
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="{{ url('admin/profile') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" class="user-img border border-dark border-2 rounded-circle" alt="user avatar">						
						<div class="user-info">
							<p class="user-name mb-0">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</p>
							<p class="designattion mb-0">
								@if(Auth::check())
									@if($profileData->role == 'admin')
										Admin
									@elseif($profileData->role == 'staff')
										FPOP Staff
									@else
										Client
									@endif
								@endif
							</p>
							</div>
						</a>
						<ul class="dropdown-menu p-0 dropdown-menu-end">
							<li>
								<!-- Profile Picture -->
								<div class="d-flex flex-column align-items-center border-bottom px-4 py-3">
									<img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="Profile Picture" class="img-thumbnail rounded-circle" style="width: 100px; height: 100px;" >
									
									<h6 class="mt-3 mb-1 text-center fs-6">{{ $profileData->name }}</h6>
									<p class="text-muted mb-0 text-center fs-7">{{ $profileData->email }}</p>

								</div>
								
							</li>

							<ul class="list-unstyled p-1 mt-1 mb-1">
								<li>
									<a class="dropdown-item d-flex align-items-center" href="{{ url('admin/profile') }}">
										<i class='bx bx-user-circle'></i>
										<span>Profile</span>
									</a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="{{ route('admin.change.password') }}">
										<i class='bx bx-edit-alt'></i>
										<span>Change Password</span>
									</a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="{{ route('site.setting') }}">
										<i class='bx bx-cog' ></i>
										<span> Site Settings</span>
									</a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}">
										<i class='bx bx-log-out'></i>
										<span>Logout</span>
									</a>
								</li>
							</ul>
							
							
		
							
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->