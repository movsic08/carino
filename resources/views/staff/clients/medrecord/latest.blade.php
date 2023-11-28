<style>
        .hospital-invoice-container h6 {
            text-align: center;
            color: #333;
        }

        .hospital-invoice-container table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .hospital-invoice-container th,
        .hospital-invoice-container td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .hospital-invoice-container th {
            background-color: #f2f2f2;
        }

        .hospital-invoice-container .btn {
        display: inline-block;
        padding: 6px 12px; 
        font-size: 12px;
        text-align: center;
        text-decoration: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 4px;
        transition: background-color 0.3s;
        margin-top: 10px;
        display: block;
    }

    .hospital-invoice-container .btn:hover {
        background-color: #0056b3;
    }

        .hospital-invoice-container .no-records {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
    </style>

<div class="hospital-invoice-container">
    
    <h6>Latest Assessment Details</h6>

    @if ($client->assessmentRecords->isNotEmpty())
        <table>
            <tbody>
                @php
                $latestAssessment = $client->assessmentRecords
                    ->where('follow_up_visit_date', '>=', now()->format('Y-m-d'))
                    ->sortBy('follow_up_visit_date')
                    ->first();
            @endphp
               <tr>
                <th>Medical Findings</th>
                <td>{{ strip_tags($latestAssessment->medical_findings ?? 'N/A') }}</td>
            </tr>            
                <tr>
                    <th>Service Provider</th>
                    <td>{{ $latestAssessment->service_provider_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Date of Visit</th>
                    <td>{{ $latestAssessment->date_of_visit ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Follow-up Visit Date</th>
                    <td>{{ $latestAssessment->follow_up_visit_date ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <div class="row">
            <div class="col">
                <a href="{{ route('view-client-assessments', ['id' => $client->id]) }}" class="btn btn-sm">
                    View All Assessments
                </a>
            </div>
            <div class="col">
                <a href="{{ route('view-latest-assessment', ['id' => $latestAssessment->id]) }}" class="btn btn-sm">
                    View Latest Assessment
                </a>
            </div>
        </div>
        
    @else
        <p class="no-records">No assessment records available.</p>
    @endif
</div>

