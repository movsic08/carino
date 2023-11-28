<?php

namespace App\Http\Controllers\Admin;


use App\Models\AssessmentRecord;
use App\Models\Client;
use App\Models\MedicalRecord;
use App\Models\Inventory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function addClient()
    {
        return view('admin.clients.add-client');
    } // end of addClient

    public function storeClient(Request $request)
    {
        $data = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string|max:255',
            'street_number' => 'nullable|string|max:255',
            'street_name' => 'nullable|string|max:255',
            'barangay' => 'required|string|max:255',
            'city_municipality' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'educational_attainment' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'civil_status' => 'required|in:Single,Married,Divorced,Widowed,Separated',
            'religion' => 'required|string|max:255',
            'spouse_last_name' => 'required|string|max:255',
            'spouse_first_name' => 'required|string|max:255',
            'spouse_middle_name' => 'nullable|string|max:255',
            'spouse_date_of_birth' => 'required|date',
            'spouse_age' => 'nullable|integer',
            'spouse_occupation' => 'required|string|max:255',
            'number_of_children' => 'required|integer',
            'plan_more_children' => 'required|in:Yes,No',
            'average_monthly_income' => 'required|numeric',
            'type_of_client' => 'string|max:255',
            'reason_for_fp' => 'string|max:255',
            'other_reason' => 'nullable|string|max:255',
            'method_accepted' => 'required|string|max:255',
            'iud_type' => 'nullable|string|max:255',
            'other_method_reason' => 'nullable|string|max:255',
        ]);

        $client = Client::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'] ?? 'N/A',
            'date_of_birth' => $data['date_of_birth'],
            'age' => $data['age'],
            'gender' => $data['gender'],
            'street_number' => $data['street_number'] ?? 'N/A',
            'street_name' => $data['street_name'] ?? 'N/A',
            'barangay' => $data['barangay'],
            'city_municipality' => $data['city_municipality'],
            'province' => $data['province'],
            'contact_number' => $data['contact_number'],
            'educational_attainment' => $data['educational_attainment'],
            'occupation' => $data['occupation'],
            'civil_status' => $data['civil_status'],
            'religion' => $data['religion'],
            'spouse_last_name' => $data['spouse_last_name'],
            'spouse_first_name' => $data['spouse_first_name'],
            'spouse_middle_name' => $data['spouse_middle_name'] ?? 'N/A',
            'spouse_date_of_birth' => $data['spouse_date_of_birth'],
            'spouse_age' => $data['spouse_age'],
            'spouse_occupation' => $data['spouse_occupation'],
            'number_of_children' => $data['number_of_children'],
            'plan_more_children' => $data['plan_more_children'],
            'average_monthly_income' => $data['average_monthly_income'],
            'type_of_client' => $data['type_of_client'],
            'reason_for_fp' => $data['reason_for_fp'],
            'other_reason' => $data['other_reason'] ?? 'N/A',
            'method_accepted' => $data['method_accepted'],
        ]);
    
        // Handle special cases for method_accepted
        if ($data['method_accepted'] === 'IUD' && $data['iud_type']) {
            $client->method_accepted = 'IUD, ' . $data['iud_type'];
        } elseif ($data['method_accepted'] === 'OTHER' && $data['other_method_reason']) {
            $client->method_accepted = 'OTHER, ' . $data['other_method_reason'];
        }
    
        // Generate a unique client ID number using method, birthdate (last 2 digits of year, month, and day), and a random letter + random number
        $method = substr($data['method_accepted'], 0, 3);
        $birthdateYear = date('y', strtotime($data['date_of_birth']));
        $birthdateMonth = date('m', strtotime($data['date_of_birth']));
        $birthdateDay = date('d', strtotime($data['date_of_birth']));
        $randomLetter = chr(rand(65, 90));
        
        $existingNumbers = [];
        $attempts = 0;
        $maxAttempts = 100;
        
        while ($attempts < $maxAttempts) {
            $randomNumber = mt_rand(100, 999);
        
            // Check if the generated number already exists
            if (!in_array($randomNumber, $existingNumbers)) {
                $existingNumbers[] = $randomNumber;
        
                // Generating client_idnumber
                $clientIDNumber = $method . $birthdateYear . $birthdateMonth . $birthdateDay . $randomLetter . $randomNumber;
                $client->client_idnumber = $clientIDNumber;
        
                // Generating client_code
                $clientCode = strtoupper(substr($data['last_name'], 0, 1) . substr($data['first_name'], 0, 1) . substr($data['middle_name'], 0, 1) . $birthdateMonth . $birthdateDay);
                $client->client_code = $clientCode;
        
                break;
            }
        
            $attempts++;
        }
        
        if ($attempts >= $maxAttempts) {
            return back()->with('error', 'Unable to generate a unique random number after ' . $maxAttempts . ' attempts.');
        }
    
        $client->save();
    
        return back()->with('message', 'Client created successfully.');
    } // end of store

    public function viewClientList()
    {
        $clients = Client::all();
        return view('admin.clients.clients-table', ['clients' => $clients]);
    }

    public function manageClientList()
    {
        // Retrieve a list of clients
        $clients = Client::all();

        // You can customize this logic based on your application's requirements

        // Return a view or JSON response, depending on your needs
        return view('admin.clients.manage-client-directory', ['clients' => $clients]);
    }

    public function filterClients(Request $request)
    {
        // Apply filters to the Client model
        $clients = Client::when($request->filled('fromDate'), function ($q) use ($request) {
                return $q->whereDate('created_at', '>=', $request->fromDate);
            })
            ->when($request->filled('toDate'), function ($q) use ($request) {
                return $q->whereDate('created_at', '<=', $request->toDate);
            })
            ->when($request->filled('filter'), function ($q) use ($request) {
                return $q->where('method_accepted', 'like', '%' . $request->filter . '%');
            })
            ->paginate(20);
    
        // Pass the filtered data and any relevant filter values to the view
        return view('admin.clients.clients-table', [
            'clients' => $clients,
            'selectedFromDate' => $request->fromDate,
            'selectedToDate' => $request->toDate,
            'selectedMethod' => $request->filter,
        ]);
    }

    public function deleteClient($encrypted_id)
    {
        $id = Crypt::decrypt($encrypted_id);
        $client = Client::find($id);

        if ($client) {
            // Soft delete the client
            $client->delete();
            return redirect()->route('manage-client-directory')->with('success', 'Client deleted successfully.');
        }

        return redirect()->route('manage-client-directory')->with('error', 'Client not found.');
    }

    public function showDeletedClients()
    {
        // Retrieve only soft-deleted clients
        $deletedClients = Client::onlyTrashed()->get();

        return view('admin.clients.deleted-clients-directory', compact('deletedClients'));
    }

    public function restoreClient($encrypted_id)
    {
        $id = Crypt::decrypt($encrypted_id);
        // Find the soft-deleted client by ID
        $client = Client::onlyTrashed()->find($id);

        if ($client) {
            // Restore the client
            $client->restore();
            return redirect()->route('deleted-clients')->with('success', 'Client restored successfully.');
        }

        return redirect()->route('deleted-clients')->with('error', 'Client not found.');
    }

    
    public function viewClientProfile($encryptedId)
    {
        try {
            $clientId = Crypt::decrypt($encryptedId); // Decrypt the identifier

            $client = Client::findOrFail($clientId);

            // Fetch the related medical record
            $medicalRecord = $client->medicalRecord;

            // Check if there are any related medical information records
            $hasMedicalInfo = !empty($medicalRecord);

            // Check if there are any related assessment records
            $hasAssessmentRecords = !empty($client->assessment_records);

            return view('admin.clients.client-medical-profile', compact('client', 'hasMedicalInfo', 'hasAssessmentRecords', 'medicalRecord', 'clientId'));
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404);
        }
    }


    public function updateClientProfile(Request $request, $id)
    {
        $request->validate([
            'actual_date_joined' => ['nullable', 'date'],
        ]);

        $client = Client::find($id);

        if (!$client) {
            return redirect()->back()->with('error', 'Client not found.');
        }

        $client->actual_date_joined = $request->input('actual_date_joined');
        $client->save();

        $encryptedId = Crypt::encrypt($client->id);

        return redirect()->route('view-client-profile', ['encrypted_id' => $encryptedId])->with('success', 'Client profile updated successfully.');
    }

    

    public function addAssessmentRecord($id)
    {
        // Retrieve the client based on the provided ID
        $client = Client::findOrFail($id);

        // You can pass the client to the view
        return view('admin.clients.add-assessment-record', compact('client'));
    }
    
    public function storeAssessmentRecord(Request $request, $id)
{
    // Validate the form data
    $data = $request->validate([
        'assessment_client_name' => 'required|string',
        'medical_findings' => 'required|string',
        'method_accepted' => 'required|string',
        'service_provider_name' => 'required|string',
        'follow_up_visit_date' => 'nullable|date',
        'contraceptive_item' => 'required|exists:inventory,id',
        'quantity_used' => 'required|integer|min:1',
    ]);

    // Find the client
    $client = Client::findOrFail($id);

    // Ensure that 'method_accepted' is limited to three letters for code generation
    $methodAcceptedCode = substr($data['method_accepted'], 0, 3);

    // Generate assessment code
    $currentYear = date('y');
    $currentMonth = date('m');
    $currentDay = date('d');

    // Generate a random letter
    $randomLetter = Str::random(1);

    // Generate a random two-digit number
    $randomNumber = str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);

    // Combine all parts to create the assessment code
    $assessmentCode = $methodAcceptedCode . $currentYear . $currentMonth . $currentDay . $randomLetter . $randomNumber;

    // Create and save the assessment record
    $assessmentRecord = AssessmentRecord::create([
        'client_id' => $id,
        'assessment_client_name' => $data['assessment_client_name'],
        'medical_findings' => $data['medical_findings'] ?? '',
        'method_accepted' => $data['method_accepted'],
        'service_provider_name' => $data['service_provider_name'],
        'follow_up_visit_date' => $data['follow_up_visit_date'],
        'assessment_code' => $assessmentCode,
        'contraceptive_item_id' => $data['contraceptive_item'],
        'quantity_used' => $data['quantity_used'],
    ]);

    // Update inventory quantity through the relationship
    $assessmentRecord->contraceptiveItem->decrement('stocks', $data['quantity_used']);

    return redirect()
    ->route('view-client-assessments', ['id' => $client->id])
    ->with('message', 'Assessment record added successfully.');
}




    public function manageAssessmentList()
    {
        try {
            // Retrieve assessment records
            $assessmentRecords = AssessmentRecord::all(); // Adjust as needed

            return view('admin.clients.manage-assessments', compact('assessmentRecords'));
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during the retrieval
            return redirect()->back()->with('error', 'Error retrieving assessment records.');
        }
    }

    public function deleteAssessment($id)
    {
        try {
            // Find the assessment record by ID
            $assessmentRecord = AssessmentRecord::findOrFail($id);

            // Perform soft delete
            $assessmentRecord->delete();

            // Redirect with success message
            return redirect()->route('manage-directory')->with('success', 'Assessment record soft-deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during the deletion
            return redirect()->back()->with('error', 'Error soft-deleting assessment record.');
        }
    }

    public function showDeletedAssessmentRecords()
    {
        try {
            // Retrieve only soft-deleted assessment records
            $deletedAssessmentRecords = AssessmentRecord::onlyTrashed()->get();

            return view('admin.clients.deleted-assessments', compact('deletedAssessmentRecords'));
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during the retrieval
            return redirect()->back()->with('error', 'Error retrieving soft-deleted assessment records.');
        }
    }

    public function filterAssessmentRecords(Request $request)
    {
        // Fetch clients with assessment records
        $clientsWithAssessments = Client::has('assessmentRecords')->with('assessmentRecords')->get();

        // Debugging: Check if the request parameters are being received correctly
    
        $assessmentRecords = AssessmentRecord::when($request->filled('fromDate'), function ($query) use ($request) {
            $query->whereDate('created_at', '>=', $request->fromDate);
        })
        ->when($request->filled('toDate'), function ($query) use ($request) {
            $query->whereDate('created_at', '<=', $request->toDate);
        })
        ->when($request->filled('filter'), function ($query) use ($request) {
            $query->where('method_accepted', $request->filter);
        })
        ->paginate(20);


        return view('admin.clients.assessment-directory', [
            'clientsWithAssessments' => $clientsWithAssessments,
            'assessmentRecords' => $assessmentRecords,
            'selectedFromDate' => $request->filled('fromDate') ? $request->fromDate : null,
            'selectedToDate' => $request->filled('toDate') ? $request->toDate : null,
            'selectedMethod' => $request->filled('filter') ? $request->filter : null,
        ]);
    }


    public function viewAssessmentRecordList()
    {
        // Fetch clients with assessment records
        $clientsWithAssessments = Client::has('assessmentRecords')->with('assessmentRecords')->get();
    
        return view('admin.clients.assessment-directory', compact('clientsWithAssessments'));
    }

    public function viewClientAssessments($id)
    {
        // Fetch the client and their assessments
        $client = Client::with('assessmentRecords')->find($id);

        // Check if the client is found
        if (!$client) {
            return redirect()->back()->with('error', 'Client not found.');
        }

        // Access the assessments through the loaded relationship
        $assessmentRecords = $client->assessmentRecords;

        // Fetch additional assessments from the assessment table along with the client information
        $additionalAssessments = AssessmentRecord::with('client')->where('client_id', $id)->get();

        return view('admin.clients.view-assessments', compact('client', 'assessmentRecords', 'additionalAssessments'));
    }

    public function viewIndividualAssessment($id)
    {
        $assessment = AssessmentRecord::find($id);

        if (!$assessment) {
            abort(404);
        }

        return view('admin.clients.individual-assessment', ['assessment' => $assessment]);
    }



    public function viewLatestAssessment($id)
    {
        // Fetch the client and their latest assessment
        $client = Client::find($id);

        // Check if the client is found
        if (!$client) {
            return redirect()->back()->with('error', 'Client not found.');
        }

        // Assuming you have a relationship method in your Client model
        $assessmentRecords = $client->assessmentRecords;

        // Check if the client has assessment records
        if ($assessmentRecords->isEmpty()) {
            return view('admin.clients.medrecord.latest', compact('client'))->with('error', 'No assessment records available.');
        }

        // Get the latest assessment based on creation date
        $latestAssessment = $assessmentRecords->sortByDesc('created_at')->first();

        // You can modify this logic based on your actual data structure and relationships

        return view('admin.clients.medrecord.latest', compact('client', 'latestAssessment'));
    }


    public function viewClientPersonalInfo($id)
    {
        // Fetch the client information based on the provided $id
        $client = Client::find($id);

        // Check if the client is found
        if (!$client) {
            abort(404); // You can customize the error response as needed
        }

        // You can pass the client data to a view
        return view('admin.clients.view-client-personal', ['client' => $client]);
    }


    public function editClientPersonalInfo($id)
{
    // Fetch the client information based on the provided $id
    $client = Client::find($id);

    // Check if the client is found
    if (!$client) {
        abort(404); // You can customize the error response as needed
    }

    // You can pass the client data to an edit view
    return view('admin.clients.edit-client-personal', ['client' => $client]);
}

public function updateClientPersonalInfo(Request $request, $id)
{
    // Validate the form data
    $request->validate([
        'last_name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'date_of_birth' => 'required|date',
        'age' => 'nullable|integer',
        'gender' => 'nullable|string|max:255',
        'street_number' => 'nullable|string|max:255',
        'street_name' => 'nullable|string|max:255',
        'barangay' => 'required|string|max:255',
        'city_municipality' => 'required|string|max:255',
        'province' => 'required|string|max:255',
        'contact_number' => 'required|string|max:255',
        'educational_attainment' => 'required|string|max:255',
        'occupation' => 'required|string|max:255',
        'civil_status' => 'required|in:Single,Married,Divorced,Widowed,Separated',
        'religion' => 'required|string|max:255',
        'spouse_last_name' => 'required|string|max:255',
        'spouse_first_name' => 'required|string|max:255',
        'spouse_middle_name' => 'nullable|string|max:255',
        'spouse_date_of_birth' => 'required|date',
        'spouse_age' => 'nullable|integer',
        'spouse_occupation' => 'required|string|max:255',
        'number_of_children' => 'required|integer',
        'plan_more_children' => 'required|in:Yes,No',
        'average_monthly_income' => 'required|numeric',
    ]);

    // Update the client information
    $client = Client::find($id);
    if (!$client) {
        abort(404);
    }

    // Update each field based on the form data
    $client->last_name = $request->input('last_name');
    $client->first_name = $request->input('first_name');
    $client->middle_name = $request->input('middle_name');
    $client->date_of_birth = $request->input('date_of_birth');
    $client->age = $request->input('age');
    $client->gender = $request->input('gender');
    $client->street_number = $request->input('street_number');
    $client->street_name = $request->input('street_name');
    $client->barangay = $request->input('barangay');
    $client->city_municipality = $request->input('city_municipality');
    $client->province = $request->input('province');
    $client->contact_number = $request->input('contact_number');
    $client->educational_attainment = $request->input('educational_attainment');
    $client->occupation = $request->input('occupation');
    $client->civil_status = $request->input('civil_status');
    $client->religion = $request->input('religion');
    $client->spouse_last_name = $request->input('spouse_last_name');
    $client->spouse_first_name = $request->input('spouse_first_name');
    $client->spouse_middle_name = $request->input('spouse_middle_name');
    $client->spouse_date_of_birth = $request->input('spouse_date_of_birth');
    $client->spouse_age = $request->input('spouse_age');
    $client->spouse_occupation = $request->input('spouse_occupation');
    $client->number_of_children = $request->input('number_of_children');
    $client->plan_more_children = $request->input('plan_more_children');
    $client->average_monthly_income = $request->input('average_monthly_income');

    $client->save();

    // Redirect to the view page with a success message
    return redirect()->route('view-client-personal-info', ['id' => $id])->with('success', 'Client information updated successfully');
}


}
