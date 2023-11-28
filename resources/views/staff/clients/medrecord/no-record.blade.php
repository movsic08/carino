<!DOCTYPE html>
<html>
<head>
    <title>View Medical Record</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Client's Medical Record</h1>

        @if ($medicalRecord)
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Medical History</h5>
                <p class="card-text">Severe Headaches: {{ $medicalRecord->medical_history_severe_headaches }}</p>
                <!-- Add more fields as needed -->

                <a href="{{ route('add-medical-record-form', ['id' => $medicalRecord->client_id]) }}" class="btn btn-primary">Edit Medical Record</a>
            </div>
        </div>
        @else
        <div class="alert alert-warning mt-4">
            <strong>No Medical Record Found</strong>
            <p>This client does not have a medical record. You can <a href="{{ route('add-medical-record', ['id' => $medicalRecord->client_id]) }}">add one</a>.</p>
        </div>
        @endif
    </div>

    <!-- Include Bootstrap JS and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
