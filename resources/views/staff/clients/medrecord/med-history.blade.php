<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bootstrap Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Medical Record Details</div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-8">History of Severe Headaches:</dt>
                            <dd class="col-sm-4">
                                {{ $medicalRecord->medical_history_severe_headaches == 0 ? 'No' : 'Yes' }}
                            </dd>
                            <dt class="col-sm-8">Stroke, Heart Attack, Hypertension:</dt>
                            <dd class="col-sm-4">
                                {{ $medicalRecord->medical_history_stroke_heart_attack_hypertension == 0 ? 'No' : 'Yes' }}
                            </dd>
                            
                            <dt class="col-sm-8">Hematoma, Bruising, Gum Bleeding:</dt>
                            <dd class="col-sm-4">
                                {{ $medicalRecord->medical_history_hematoma_bruising_gum_bleeding == 0 ? 'No' : 'Yes' }}
                            </dd>
                            
                            <dt class="col-sm-8">Breast Cancer Mass:</dt>
                            <dd class="col-sm-4">
                                {{ $medicalRecord->medical_history_breast_cancer_mass == 0 ? 'No' : 'Yes' }}
                            </dd>
                            <dt class="col-sm-8">Severe Chest Pain:</dt>
                            <dd class="col-sm-4">
                                {{ $medicalRecord->medical_history_severe_chest_pain == 0 ? 'No' : 'Yes' }}
                            </dd>

                            <dt class="col-sm-8">Cough:</dt>
                            <dd class="col-sm-4">
                                {{ $medicalRecord->medical_history_cough == 0 ? 'No' : 'Yes' }}
                            </dd>

                            <dt class="col-sm-8">Jaundice:</dt>
                            <dd class="col-sm-4">
                                {{ $medicalRecord->medical_history_jaundice == 0 ? 'No' : 'Yes' }}
                            </dd>

                            <dt class="col-sm-8">Vaginal Bleeding:</dt>
                            <dd class="col-sm-4">
                                {{ $medicalRecord->medical_history_vaginal_bleeding == 0 ? 'No' : 'Yes' }}
                            </dd>

                            <dt class="col-sm-8">Vaginal Discharge:</dt>
                            <dd class="col-sm-4">
                                {{ $medicalRecord->medical_history_vaginal_discharge == 0 ? 'No' : 'Yes' }}
                            </dd>

                            <dt class="col-sm-8">Medication:</dt>
                            <dd class="col-sm-4">
                                {{ $medicalRecord->medical_history_medication == 0 ? 'No' : 'Yes' }}
                            </dd>

                            <dt class="col-sm-8">Smoker:</dt>
                            <dd class="col-sm-4">
                                {{ $medicalRecord->medical_history_smoker == 0 ? 'No' : 'Yes' }}
                            </dd>

                            <dt class="col-sm-8">Disability:</dt>
                            <dd class="col-sm-4">
                                @if ($medicalRecord->medical_history_disability == 0)
                                    No
                                @else
                                    Yes: {{ $medicalRecord->medical_history_disability_specify }}
                                @endif
                            </dd>                    
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (optional, but required for some Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
