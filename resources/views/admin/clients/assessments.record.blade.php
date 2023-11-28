<h1>Client Assessment Profile</h1>

    {{-- Display client information --}}
    <h2>{{ $client->name }}'s Assessment History</h2>

    {{-- Display assessment history --}}
    @foreach($assessmentHistory as $assessment)
        <p>Date of Visit: {{ $assessment->date_of_visit }}</p>
        <p>Medical Findings: {{ $assessment->medical_findings }}</p>
        <p>Method Accepted: {{ $assessment->method_accepted }}</p>
        <p>Service Provider Name: {{ $assessment->service_provider_name }}</p>
        <p>Follow-up Visit Date: {{ $assessment->follow_up_visit_date }}</p>
        {{-- Add more fields as needed --}}
    @endforeach