<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Add Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .certificate {
      max-width: 800px;
      margin: 25px auto;
      background-color: #ffffff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      position: relative;
    }
    .logo {
      max-width: 100px;
      margin-bottom: 20px;
    }
    .watermark {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-height: 100%;
      filter: grayscale(100%);
      opacity: 0.3;
    }
    .signature {
      position: absolute;
      bottom: 20px;
      right: 20px;
    }
    .timestamp {
      position: absolute;
      bottom: 50px;
      right: 20px;
    }
    .buttons {
      margin-top: 20px;
      text-align: center;
    }
    .icon-btn {
    font-size: 16px;
    margin: 0 5px;
    }

    /* Hide buttons when printing */
    @media print {
      .buttons {
        display: none;
      }

      
      @page {
        size: auto;
        margin: 10mm;
      }

      body {
        margin: 0;
        padding: 0;
      }

      /* Ensure the certificate fits the page */
      .certificate {
        max-width: 100%;
        margin: 0;
        box-shadow: none;
      }
    }
  </style>
</head>
<body>

  <div class="certificate">
    <img src="https://fpop1969.org/wp-content/uploads/2022/09/fpop-full-blue-1.png" alt="Logo" class="logo img-fluid">
    <h2 class="text-center mb-5">Family Planning Assessment</h2>

    <p class="mb-0">Date Assessed: <strong>{{ $assessment->follow_up_visit_date }}</strong></p>
    <br>
    <div class="d-flex mb-3">
      <div class="mr-3" style="font-weight: bold;">Family Planning Findings:</div>
      <div>{{ strip_tags($assessment->medical_findings) }}</div>
  </div>

    <p>This is to certify that <strong>{{ $assessment->assessment_client_name }}</strong> has been assessed for family planning services using the method: <em>{{ $assessment->method_accepted }}</em></p>

    <div class="mt-4">
        <p>Service Provider:</p>
        <p>{{ $assessment->service_provider_name }}</p>
    </div>

    <!-- Watermark as Image -->
    <img src="https://fpop1969.org/wp-content/uploads/2022/10/logo-768x768.png" alt="Watermark" class="watermark img-fluid">

    <!-- Signature with Timestamp -->
    <div class="signature">
        <p>Signature: __________________________</p>
        <p>Date: {{ date('Y-m-d H:i:s') }}</p>
    </div>
</div>
<!-- Back and Print Buttons -->
<div class="buttons">
    <button class="btn btn-secondary icon-btn" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
    <button class="btn btn-primary icon-btn" onclick="printCertificate()"><i class="fas fa-print"></i></button>
</div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script>
    function goBack() {
      window.history.back();
    }

    function printCertificate() {
      window.print();
    }
  </script>
</body>
</html>
