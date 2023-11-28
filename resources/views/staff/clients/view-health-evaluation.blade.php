<div class="container">
    <h2>Health Evaluation for {{ $client->getFullNameAttribute() }}</h2>

    @if($medicalRecord)
        <!-- Tab 1: General Health -->
        <h3>Tab 1: General Health</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
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
                    <td>Breast Cancer Mass</td>
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
                <tr>
                    <td>Jaundice</td>
                    <td>{{ $medicalRecord->medical_history_jaundice ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Vaginal Bleeding</td>
                    <td>{{ $medicalRecord->medical_history_vaginal_bleeding ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Vaginal Discharge</td>
                    <td>{{ $medicalRecord->medical_history_vaginal_discharge ? 'Yes' : 'No' }}</td>
                </tr>
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


        <!-- Tab 2: Pregnancy -->
        <h3>Tab 2: Pregnancy</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Gravida</td>
                    <td>{{ $medicalRecord->pregnancies_gravida ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Para</td>
                    <td>{{ $medicalRecord->pregnancies_para ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Full Term</td>
                    <td>{{ $medicalRecord->full_term ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Premature</td>
                    <td>{{ $medicalRecord->premature ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Abortion</td>
                    <td>{{ $medicalRecord->abortion ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Living Children</td>
                    <td>{{ $medicalRecord->living_children ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Last Delivery Date</td>
                    <td>{{ $medicalRecord->last_delivery_date }}</td>
                </tr>
                <tr>
                    <td>Last Delivery Type</td>
                    <td>{{ $medicalRecord->last_delivery_type }}</td>
                </tr>
                <tr>
                    <td>Last Menstrual Period</td>
                    <td>{{ $medicalRecord->last_menstrual_period }}</td>
                </tr>
                <tr>
                    <td>Previous Menstrual Period</td>
                    <td>{{ $medicalRecord->previous_menstrual_period }}</td>
                </tr>
                <tr>
                    <td>Menstrual Flow</td>
                    <td>{{ $medicalRecord->menstrual_flow }}</td>
                </tr>
                <tr>
                    <td>Dysmenorrhea</td>
                    <td>{{ $medicalRecord->dysmenorrhea ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Hydatidiform Mole</td>
                    <td>{{ $medicalRecord->hydatidiform_mole ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Ectopic Pregnancy</td>
                    <td>{{ $medicalRecord->ectopic_pregnancy }}</td>
                </tr>
            </tbody>
        </table>


        <!-- Tab 3: STI and Violence -->
        <h3>Tab 3: STI and Violence</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>STI Discharge</td>
                    <td>{{ $medicalRecord->sti_discharge ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>STI Sores</td>
                    <td>{{ $medicalRecord->sti_sores ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>STI Pain</td>
                    <td>{{ $medicalRecord->sti_pain ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>STI Treatment</td>
                    <td>{{ $medicalRecord->sti_treatment ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>STI HIV/AIDS/PID</td>
                    <td>{{ $medicalRecord->sti_hiv_aid_pid ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>STI Discharge Location</td>
                    <td>{{ $medicalRecord->sti_discharge_location ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>VAW Unpleasant Relationship</td>
                    <td>{{ $medicalRecord->vaw_unpleasant_relationship ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>VAW Partner Approval</td>
                    <td>{{ $medicalRecord->vaw_partner_approval ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>VAW Domestic Violence</td>
                    <td>{{ $medicalRecord->vaw_domestic_violence ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <td>VAW Support</td>
                    <td>{{ $medicalRecord->vaw_support ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>VAW Support Others Specify</td>
                    <td>{{ $medicalRecord->vaw_support_others_specify ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>


        <!-- Tab 4: Physical Examination -->
<h3>Tab 4: Physical Examination</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Question</th>
            <th>Answer</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Weight</td>
            <td>{{ $medicalRecord->weight ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Blood Pressure</td>
            <td>{{ $medicalRecord->blood_pressure ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Height</td>
            <td>{{ $medicalRecord->height ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Pulse Rate</td>
            <td>{{ $medicalRecord->pulse_rate ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Skin</td>
            <td>{{ $medicalRecord->skin ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Extremities</td>
            <td>{{ $medicalRecord->extremities ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Conjunctiva</td>
            <td>{{ $medicalRecord->conjunctiva ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Neck</td>
            <td>{{ $medicalRecord->neck ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Breast</td>
            <td>{{ $medicalRecord->breast ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Abdomen</td>
            <td>{{ $medicalRecord->abdomen ?? 'N/A' }}</td>
        </tr>
    </tbody>
</table>
                
@if ($client->method_accepted === 'IUD' && $medicalRecord && $medicalRecord->pelvic_examination_normal !== null)
    <!-- Pelvic Examination -->
    <h3>Pelvic Examination</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Pelvic Examination: Normal</td>
                <td>{{ $medicalRecord->pelvic_examination_normal ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Pelvic Examination: Mass</td>
                <td>{{ $medicalRecord->pelvic_examination_mass ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Pelvic Examination: Abnormal Discharge</td>
                <td>{{ $medicalRecord->pelvic_examination_abnormal_discharge ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Pelvic Examination: Cervical Abnormalities</td>
                <td>{{ $medicalRecord->pelvic_examination_cervical_abnormalities ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Cervical Condition</td>
                <td>{{ $medicalRecord->cervical_condition ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Pelvic Examination: Cervical Consistency</td>
                <td>{{ $medicalRecord->pelvic_examination_cervical_consistency ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Cervical Consistency Condition</td>
                <td>{{ $medicalRecord->cervical_consistency_condition ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Pelvic Examination: Cervical Tenderness</td>
                <td>{{ $medicalRecord->pelvic_examination_cervical_tenderness ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Pelvic Examination: Adnexal Mass Tenderness</td>
                <td>{{ $medicalRecord->pelvic_examination_adnexal_mass_tenderness ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Pelvic Examination: Uterine Position</td>
                <td>{{ $medicalRecord->pelvic_examination_uterine_position ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Uterine Position Condition</td>
                <td>{{ $medicalRecord->uterine_position_condition ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Pelvic Examination: Uterine Depth</td>
                <td>{{ $medicalRecord->pelvic_examination_uterine_depth ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Uterine Depth</td>
                <td>{{ $medicalRecord->uterine_depth ?? 'N/A' }}</td>
            </tr>
        </tbody>
    </table>
@endif

    @else
        <div class="text-center info-box">
            <p style="font-size: 24px; opacity: 0.7;">No Medical Information</p>
            <i class="fa-solid fa-file-circle-exclamation fa-fade" style="font-size: 60px;"></i>
        </div>
    @endif
</div>