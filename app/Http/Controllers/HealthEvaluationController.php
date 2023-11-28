<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\MedicalRecord;

use Illuminate\Http\Request;

class HealthEvaluationController extends Controller
{
    public function addMedicalRecord($id)
    {
        // Retrieve the client based on the ID
        $client = Client::findOrFail($id);

        // Load a view for adding a medical record
        return view('admin.clients.add-medical-record', compact('client'));
    }

    public function storeMedicalRecord(Request $request, $id)
    {
        // Retrieve the client data
        $client = Client::find($id);
        // Validation and logic for storing medical record
        $data = $request->validate([
            // Tab 1
            'medical_history_severe_headaches' => 'nullable|string|in:N/A',
            'medical_history_stroke_heart_attack_hypertension' => 'nullable|string|in:N/A',
            'medical_history_hematoma_bruising_gum_bleeding' => 'nullable|string|in:N/A',
            'medical_history_breast_cancer_mass' => 'nullable|string|in:N/A',
            'medical_history_severe_chest_pain' => 'nullable|string|in:N/A',
            'medical_history_cough' => 'nullable|string|in:N/A',
            'medical_history_jaundice' => 'nullable|string|in:N/A',
            'medical_history_vaginal_bleeding' => 'nullable|string|in:N/A',
            'medical_history_vaginal_discharge' => 'nullable|string|in:N/A',
            'medical_history_medication' => 'nullable|string|in:N/A',
            'medical_history_smoker' => 'nullable|string|in:N/A',
            'medical_history_disability' => 'nullable|string|in:N/A',
            'medical_history_disability_specify' => 'nullable|string|max:255',
        
            // Tab 2
            'pregnancies_gravida' => 'nullable|integer',
            'pregnancies_para' => 'nullable|integer',
            'full_term' => 'nullable|integer',
            'premature' => 'nullable|integer',
            'abortion' => 'nullable|integer',
            'living_children' => 'nullable|integer',                
            'last_delivery_date' => 'required|date',
            'last_delivery_type' => 'required|string|max:255',
            'last_menstrual_period' => 'required|date',
            'previous_menstrual_period' => 'required|date',
            'menstrual_flow' => 'required|string|max:255',
            'dysmenorrhea' => 'nullable|boolean',
            'hydatidiform_mole' => 'nullable|boolean',
            'ectopic_pregnancy' => ['nullable', 'in:N/A,0,1'],
        
            // Tab 3
            'sti_discharge' => 'nullable|string|in:N/A',
            'sti_sores' => 'nullable|string|in:N/A',
            'sti_pain' => 'nullable|string|in:N/A',
            'sti_treatment' => 'nullable|string|in:N/A',
            'sti_hiv_aid_pid' => 'nullable|string|in:N/A',           
            'sti_discharge_location' => 'nullable|string|max:255',
            'vaw_unpleasant_relationship' => 'nullable|string|in:N/A',
            'vaw_partner_approval' => 'nullable|string|in:N/A',
            'vaw_domestic_violence' => 'nullable|string|in:N/A',            
            'vaw_support' => 'nullable|string|max:255',
            'vaw_support_others_specify' => 'nullable|string|max:255',
        
            // Tab 4
            'weight' => 'nullable|integer',
            'blood_pressure' => 'nullable|integer',
            'height' => 'nullable|integer',
            'pulse_rate' => 'nullable|integer',
            'skin' => 'nullable|string|max:255',
            'extremities' => 'nullable|string|max:255',
            'conjunctiva' => 'nullable|string|max:255',
            'neck' => 'nullable|string|max:255',
            'breast' => 'nullable|string|max:255',
            'abdomen' => 'nullable|string|max:255',
        
            // Pelvic Examination
            'pelvic_examination_normal' => 'nullable|boolean',
            'pelvic_examination_mass' => 'nullable|boolean',
            'pelvic_examination_abnormal_discharge' => 'nullable|boolean',
            'pelvic_examination_cervical_abnormalities' => 'nullable|boolean',
            'cervical_condition' => 'nullable|string|max:255',
            'pelvic_examination_cervical_consistency' => 'nullable|boolean',
            'cervical_consistency_condition' => 'nullable|string|max:255',
            'pelvic_examination_cervical_tenderness' => 'nullable|boolean',
            'pelvic_examination_adnexal_mass_tenderness' => 'nullable|boolean',
            'pelvic_examination_uterine_position' => 'nullable|boolean',
            'uterine_position_condition' => 'nullable|string|max:255',
            'pelvic_examination_uterine_depth' => 'nullable|boolean',
            'uterine_depth' => 'nullable|numeric',

        ]);
   
        $medicalRecord = new MedicalRecord();
        // Tab 1
        $medicalRecord->medical_history_severe_headaches = $data['medical_history_severe_headaches'];
        $medicalRecord->medical_history_stroke_heart_attack_hypertension = $data['medical_history_stroke_heart_attack_hypertension'];
        $medicalRecord->medical_history_hematoma_bruising_gum_bleeding = $data['medical_history_hematoma_bruising_gum_bleeding'];
        $medicalRecord->medical_history_breast_cancer_mass = $data['medical_history_breast_cancer_mass'];
        $medicalRecord->medical_history_severe_chest_pain = $data['medical_history_severe_chest_pain'];
        $medicalRecord->medical_history_cough = $data['medical_history_cough'];
        $medicalRecord->medical_history_jaundice = $data['medical_history_jaundice'];
        $medicalRecord->medical_history_vaginal_bleeding = $data['medical_history_vaginal_bleeding'];
        $medicalRecord->medical_history_vaginal_discharge = $data['medical_history_vaginal_discharge'];
        $medicalRecord->medical_history_medication = $data['medical_history_medication'];
        $medicalRecord->medical_history_smoker = $data['medical_history_smoker'];
        $medicalRecord->medical_history_disability = $data['medical_history_disability'];
        $medicalRecord->medical_history_disability_specify = $data['medical_history_disability_specify'] ?? 'N/A';

        // Tab 2
        $medicalRecord->pregnancies_gravida = $data['pregnancies_gravida'];
        $medicalRecord->pregnancies_para = $data['pregnancies_para'];
        $medicalRecord->full_term = $data['full_term'];
        $medicalRecord->premature = $data['premature'];
        $medicalRecord->abortion = $data['abortion'];
        $medicalRecord->living_children = $data['living_children'];
        $medicalRecord->last_delivery_date = $data['last_delivery_date'];
        $medicalRecord->last_delivery_type = $data['last_delivery_type'];
        $medicalRecord->last_menstrual_period = $data['last_menstrual_period'];
        $medicalRecord->previous_menstrual_period = $data['previous_menstrual_period'];
        $medicalRecord->menstrual_flow = $data['menstrual_flow'];
        $medicalRecord->dysmenorrhea = $data['dysmenorrhea'] ?? false;
        $medicalRecord->hydatidiform_mole = $data['hydatidiform_mole'] ?? false;
        $medicalRecord->ectopic_pregnancy = $data['ectopic_pregnancy'] ?? false;

        // Tab 3
        $medicalRecord->sti_discharge = $data['sti_discharge'];
        $medicalRecord->sti_sores = $data['sti_sores'];
        $medicalRecord->sti_pain = $data['sti_pain'];
        $medicalRecord->sti_treatment = $data['sti_treatment'];
        $medicalRecord->sti_hiv_aid_pid = $data['sti_hiv_aid_pid'];
        $medicalRecord->sti_discharge_location = $data['sti_discharge_location'] ?? 'N/A';
        $medicalRecord->vaw_unpleasant_relationship = $data['vaw_unpleasant_relationship'];
        $medicalRecord->vaw_partner_approval = $data['vaw_partner_approval'];
        $medicalRecord->vaw_domestic_violence = $data['vaw_domestic_violence'];
        $medicalRecord->vaw_support = $data['vaw_support'] ?? 'N/A';
        $medicalRecord->vaw_support_others_specify = $data['vaw_support_others_specify'] ?? 'N/A';

        // Tab 4
        $medicalRecord->weight = $data['weight'];
        $medicalRecord->blood_pressure = $data['blood_pressure'];
        $medicalRecord->height = $data['height'];
        $medicalRecord->pulse_rate = $data['pulse_rate'];
        $medicalRecord->skin = $data['skin'];
        $medicalRecord->extremities = $data['extremities'];
        $medicalRecord->conjunctiva = $data['conjunctiva'];
        $medicalRecord->neck = $data['neck'];
        $medicalRecord->breast = $data['breast'];
        $medicalRecord->abdomen = $data['abdomen'];
            
            if ($client->method_accepted === 'IUD, Interval' || $client->method_accepted === 'IUD, Post Interval') {
                // This block will execute for IUD acceptors
            
                // Set values for the $medicalRecord object based on the form data
                $medicalRecord->pelvic_examination_normal = ($data['pelvic_examination_normal'] === 'N/A') ? false : $data['pelvic_examination_normal'];
                $medicalRecord->pelvic_examination_mass = ($data['pelvic_examination_mass'] ?? 'N/A') === 'N/A' ? false : $data['pelvic_examination_mass'];
                $medicalRecord->pelvic_examination_abnormal_discharge = ($data['pelvic_examination_abnormal_discharge'] ?? 'N/A') === 'N/A' ? false : $data['pelvic_examination_abnormal_discharge'];
                $medicalRecord->pelvic_examination_cervical_abnormalities = ($data['pelvic_examination_cervical_abnormalities'] ?? 'N/A') === 'N/A' ? false : $data['pelvic_examination_cervical_abnormalities'];
                $medicalRecord->cervical_condition = $data['cervical_condition'] ?? 'N/A';
                $medicalRecord->pelvic_examination_cervical_consistency = ($data['pelvic_examination_cervical_consistency'] ?? 'N/A') === 'N/A' ? false : $data['pelvic_examination_cervical_consistency'];
                $medicalRecord->cervical_consistency_condition = $data['cervical_consistency_condition'] ?? 'N/A';
                $medicalRecord->pelvic_examination_cervical_tenderness = ($data['pelvic_examination_cervical_tenderness'] ?? 'N/A') === 'N/A' ? false : $data['pelvic_examination_cervical_tenderness'];
                $medicalRecord->pelvic_examination_adnexal_mass_tenderness = ($data['pelvic_examination_adnexal_mass_tenderness'] ?? 'N/A') === 'N/A' ? false : $data['pelvic_examination_adnexal_mass_tenderness'];
                $medicalRecord->pelvic_examination_uterine_position = ($data['pelvic_examination_uterine_position'] ?? 'N/A') === 'N/A' ? false : $data['pelvic_examination_uterine_position'];
                $medicalRecord->uterine_position_condition = $data['uterine_position_condition'] ?? 'N/A';
                $medicalRecord->pelvic_examination_uterine_depth = ($data['pelvic_examination_uterine_depth'] === 'N/A') ? 0 : $data['pelvic_examination_uterine_depth'];
                $medicalRecord->uterine_depth = $data['uterine_depth'] ?? 'N/A';
                                
                // You can also perform other actions specific to IUD acceptors in this block
            
            } else {
                // This block will execute for clients who have not accepted the IUD method
            
                // You can provide a message or default values for non-IUD acceptors
                $medicalRecord->pelvic_examination_normal = false;
                $medicalRecord->pelvic_examination_mass = false;
                $medicalRecord->pelvic_examination_abnormal_discharge = false;
                $medicalRecord->pelvic_examination_cervical_abnormalities = false;
                $medicalRecord->cervical_condition = 'N/A';
                $medicalRecord->pelvic_examination_cervical_consistency = false;
                $medicalRecord->cervical_consistency_condition = 'N/A';
                $medicalRecord->pelvic_examination_cervical_tenderness = false;
                $medicalRecord->pelvic_examination_adnexal_mass_tenderness = false;
                $medicalRecord->pelvic_examination_uterine_position = false;
                $medicalRecord->uterine_position_condition = 'N/A';
                $medicalRecord->pelvic_examination_uterine_depth = false;
                $medicalRecord->uterine_depth = 'N/A';
            
                $message = 'This form is only for IUD acceptors.';
            
            }
            
        $medicalRecord->client_id = $id;

            if ($medicalRecord->save()) {
                // Medical record saved successfully
                return back()->with('message', 'Medical record added successfully.');
            } else {
                // Log errors for debugging
                logger()->error('Failed to save medical record.', ['errors' => $medicalRecord->errors()]);
                // Or use dd() for quick debugging
                dd($medicalRecord->errors());
                // Medical record save failed
                return back()->with('error', 'Failed to save medical record.');
            }
        
    }
}
