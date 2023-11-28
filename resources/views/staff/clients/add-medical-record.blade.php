<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <base href="/public">

    <!-- Favicon -->
    <link rel="icon" href="assets/img/logo-2.png" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">

    <!-- Plugins -->
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />

    <!-- Loader -->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>

    <!-- Custom Styles -->
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dark-theme.css" />
    <link rel="stylesheet" href="assets/css/semi-dark.css" />
    <link rel="stylesheet" href="assets/css/header-colors.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />
    <link rel="stylesheet" href="assets/css/form.css" />

    <title>FCRMSys | Admin Dashboard</title>

</style>


</head>

<body>
	    <!--wrapper-->
        <div class="wrapper">
        <!-- Sidebar wrapper -->
        @include('staff.body.sidebar')
        <!-- End sidebar wrapper -->

        <!-- Topbar -->
        @include('staff.body.topbar')
        <!-- End topbar -->

        <!-- Page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!-- Breadcrumb -->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Client Profile</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="bx bx-home-alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Health Evaluation</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <hr>

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs nav-primary" role="tablist">
                            <!-- Tab 1: Medical History -->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#medical-form-tab-1" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="tab-title text-center">I. MEDICAL HISTORY</div>
                                    </div>
                                </a>
                            </li>
                            <!-- Tab 2: Obstetrical History -->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#medical-form-tab-2" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="tab-title">II. OBSTETRICAL HISTORY</div>
                                    </div>
                                </a>
                            </li>
                            
                            <!-- Tab 3: Risks for Sexually Transmitted Infections -->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#medical-form-tab-3" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="tab-title">III. RISKS</div>
                                    </div>
                                </a>
                            </li>
                            <!-- Tab 4: Risks for Violence Against Women (VAW) -->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#medical-form-tab-4" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="tab-title">IV. PHYSICAL EXAMINATION</div>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <form action="{{ route('store-medical-record', ['id' => $client->id]) }}" method="post" id="medical-form">
                            @csrf
                            <div class="tab-content py-3">
                                <!-- Tab 1: Medical History -->
                                <div class="tab-pane fade show active" id="medical-form-tab-1" role="tabpanel" aria-labelledby="medical-form-tab-1">
                                    @include('staff.clients.form.medical-form-tab-1')
                                    <hr>
                                    <div class="col">
                                        <button type="button" class="btn btn-outline-secondary btn-sm float-end" id="nextTab1">
                                            Next: Obstetrical History <i class="fa-solid fa-circle-arrow-right fa-fade" style="font-size: 0.80rem;"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Tab 2: Obstetrical History -->
                                <div class="tab-pane fade" id="medical-form-tab-2" role="tabpanel" aria-labelledby="medical-form-tab-2">
                                    @include('staff.clients.form.medical-form-tab-2')
                                    <hr>
                                    <div class="d-flex justify-content-end">
                                        <div class="col">
                                            <button type="button" class="btn btn-outline-secondary btn-sm" id="prevTab1">
                                                <i class="fa-solid fa-circle-arrow-left fa-fade" style="font-size: 0.80rem;"></i> Previous
                                            </button>
                                        </div>
                                        <div class="col" style="margin-left: 0.80rem;">
                                            <button type="button" class="btn btn-outline-secondary btn-sm float-end" id="nextTab2">
                                                Next: Risks for Sexually Transmitted Infections <i class="fa-solid fa-circle-arrow-right fa-fade" style="font-size: 0.80rem;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tab 3: Risks for Sexually Transmitted Infections -->
                                <div class="tab-pane fade" id="medical-form-tab-3" role="tabpanel" aria-labelledby="medical-form-tab-3">
                                    @include('staff.clients.form.medical-form-tab-3')
                                    <hr>
                                    <div class="d-flex justify-content-end">
                                        <div class="col">
                                            <button type="button" class="btn btn-outline-secondary btn-sm" id="prevTab2">
                                                <i class="fa-solid fa-circle-arrow-left fa-fade" style="font-size: 0.80rem;"></i> Previous
                                            </button>
                                        </div>
                                        <div class="col" style="margin-left: 0.80rem;">
                                            <button type="button" class="btn btn-outline-secondary btn-sm float-end" id="nextTab3">
                                                Next: Physical Examination <i class="fa-solid fa-circle-arrow-right fa-fade" style="font-size: 0.80rem;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tab 4: Risks for Violence Against Women (VAW) -->
                                <div class="tab-pane fade" id="medical-form-tab-4" role="tabpanel" aria-labelledby="medical-form-tab-4">
                                    @include('staff.clients.form.medical-form-tab-4')
                                    <hr>
                                    <div class="d-flex justify-content-end">
                                        <div class="col">
                                            <button type="button" class="btn btn-outline-secondary btn-sm" id="prevTab3">
                                                <i class="fa-solid fa-circle-arrow-left fa-fade" style="font-size: 0.80rem;"></i> Previous
                                            </button>
                                        </div>
                                        <div class="col" style="margin-left: 0.80rem;">
                                            <button type="submit" class="btn btn-primary btn-sm float-end">
                                                <i class="fa-solid fa-floppy-disk" style="font-size: 0.80rem;"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2023. All rights reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->

	<!--start switcher-->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <!-- Vector map JavaScript -->
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Highcharts and Apexcharts -->
    <script src="assets/plugins/highcharts/js/highcharts.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>

    <!-- Custom Scripts -->
    <script src="assets/js/index2.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/multi-tab-form.js"></script>
    <script src="assets/js/form-interactions.js"></script>


    <script>
    $(document).ready(function() {
        // Initial tab index
        var currentTab = 1;

        // Function to show the current tab
        function showTab(tabIndex) {
            $(".tab-pane").removeClass("show active");
            $("#medical-form-tab-" + tabIndex).addClass("show active");

            // Scroll to the top of the page
            $(window).scrollTop(0);
        }

        // Function to navigate to the next tab
        function nextTab() {
            if (currentTab < 4) { // Assuming you have 4 tabs
                if (validateCurrentTab()) {
                    currentTab++;
                    showTab(currentTab);
                    updateActiveTabNavigation(currentTab); // Update the active tab in navigation
                }
            }
        }

        // Function to navigate to the previous tab
        function prevTab() {
            if (currentTab > 1) {
                currentTab--;
                showTab(currentTab);
                updateActiveTabNavigation(currentTab); // Update the active tab in navigation
            }
        }

        // Function to validate the current tab's required fields
        function validateCurrentTab() {
            var currentTabId = "medical-form-tab-" + currentTab;
            var requiredFields = $("#" + currentTabId + " .required-field");
            var valid = true;

            requiredFields.each(function() {
                if ($(this).val() === "") {
                    alert("Please answer all required fields before proceeding.");
                    valid = false;
                    return false; // Exit the loop
                }
            });

            return valid;
        }

        // Function to update the active tab in navigation
        function updateActiveTabNavigation(tabIndex) {
            var activeTabLink = $(".nav-link[href='#medical-form-tab-" + tabIndex + "']");
            $('.nav-link').removeClass('active');
            activeTabLink.addClass('active');
        }

        // Initial tab display
        showTab(currentTab);

        // Handle "Next" button clicks
        $("button[id^='nextTab']").on("click", function() {
            nextTab();
        });

        // Handle "Previous" button clicks
        $("button[id^='prevTab']").on("click", function() {
            prevTab();
        });

        // Disable "Next" button when required fields are empty
        $("#nextTab1").prop("disabled", !validateCurrentTab());

        // Listen for changes in required fields to enable/disable "Next" button
        $(".required-field").on("input", function() {
            $("#nextTab1").prop("disabled", !validateCurrentTab());
        });
    });
</script>



</body>
</html>