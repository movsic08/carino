<html>
    <head>
        <link rel="stylesheet" href="assets/css/custom/med-profile.css" />
        <style>
            #myTabs {
                display: none;
            }
        </style>
    </head>
    <body>

        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" id="physicalExaminationTab" data-toggle="tab" href="#physicalExamination">Physical Examination</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="generalMedicalHistoryTab" data-toggle="tab" href="#generalMedicalHistory">General Medical History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="specificMedicalConditionsTab" data-toggle="tab" href="#specificMedicalConditions">Specific Medical Conditions</a>
            </li>
        </ul>
       
        <div class="tab-content mt-4">
            <!-- Physical Examination Tab -->
            <div class="tab-pane fade show active" id="physicalExamination">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Physical Examination</h5>
                        <table class="table table-bordered mx-auto" style="font-size: 15px;">
                            <thead>
                                <tr>
                                    <th><strong>Weight:</strong></th>
                                    <th><strong>Height:</strong></th>
                                    <th><strong>Pulse Rate:</strong></th>
                                    <th><strong>Blood Pressure:</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Add your table rows here -->
                                <tr>
                                    <td>{{ $medicalRecord->weight ?? 'N/A' }}</td>
                                    <td>{{ $medicalRecord->height ?? 'N/A' }}</td>
                                    <td>{{ $medicalRecord->pulse_rate ?? 'N/A' }}</td>
                                    <td>{{ $medicalRecord->blood_pressure ?? 'N/A' }}</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
            <!-- General Medical History Tab -->
            <div class="tab-pane fade" id="generalMedicalHistory">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">General Medical History</h5>
                        <table class="table table-bordered mx-auto" style="font-size: 15px;">
                            <thead>
                                <tr>
                                    <th>Medical History Item</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Severe Headaches</td>
                                    <td>{{ $medicalRecord->medical_history_severe_headaches ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <td>Stroke/Heart Attack/Hypertension</td>
                                    <td>{{ $medicalRecord->medical_history_stroke_heart_attack_hypertension ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <td>Hematoma/Bruising/Gum Bleeding</td>
                                    <td>{{ $medicalRecord->medical_history_hematoma_bruising_gum_bleeding ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <td>Breast Cancer/Mass</td>
                                    <td>{{ $medicalRecord->medical_history_breast_cancer_mass ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <td>Severe Chest Pain</td>
                                    <td>{{ $medicalRecord->medical_history_severe_chest_pain ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <td>Cough</td>
                                    <td>{{ $medicalRecord->medical_history_cough ? 'Yes' : 'No' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
            <!-- Specific Medical Conditions Tab -->
            <div class="tab-pane fade" id="specificMedicalConditions">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Specific Medical Conditions</h5>
                        <table class="table table-bordered mx-auto" style="font-size: 15px;">
                            <thead>
                                <tr>
                                    <th>Medical History Item</th>
                                    <th>Status</th>
                                   <tr>
                                    <td>Medication</td>
                                    <td>{{ $medicalRecord->medical_history_medication ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <td>Smoker</td>
                                    <td>{{ $medicalRecord->medical_history_smoker ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <td>Disability</td>
                                    <td>{{ $medicalRecord->medical_history_disability ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <td>Disability Specify</td>
                                    <td>{{ $medicalRecord->medical_history_disability_specify ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

                
        
        <hr>
        <div class="d-flex justify-content-between align-items-center">
                <button class="btn btn-secondary btn-sm btn-view-all">
                    <i class="far fa-eye fa-lg"></i> View All
                </button>    
                
                <!--
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        <li class="page-item" id="prevTab">
                            <a class="page-link" href="#">
                                <i class="fas fa-chevron-left pagination-link"></i>
                                <span class="d-none d-md-inline">Previous</span>
                            </a>
                        </li>
                        <li class="page-item" id="nextTab">
                            <a class="page-link" href="#">
                                <i class="fas fa-chevron-right pagination-link"></i>
                                <span class="d-none d-md-inline">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav> -->
        </div>   

<!-- Pagination Section (Using DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#prevTab').click(function (e) {
            e.preventDefault();
            var currentTab = $('.tab-content .tab-pane.active');
            var prevTab = currentTab.prev('.tab-pane');
            
            if (prevTab.length > 0) {
                currentTab.removeClass('active');
                prevTab.addClass('active');
            } else {
                // If on the first tab, go to the last tab
                $('.tab-content .tab-pane:last').addClass('active');
            }
        });

        $('#nextTab').click(function (e) {
            e.preventDefault();
            var currentTab = $('.tab-content .tab-pane.active');
            var nextTab = currentTab.next('.tab-pane');
            
            if (nextTab.length > 0) {
                currentTab.removeClass('active');
                nextTab.addClass('active');
            } else {
                // If on the last tab, go to the first tab
                $('.tab-content .tab-pane:first').addClass('active');
            }
        });
    });
</script>
</body>
</html>