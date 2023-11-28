<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $table = 'medical_records';

    protected $fillable = [
        'medical_history_severe_headaches',
        'medical_history_stroke_heart_attack_hypertension',
        'medical_history_hematoma_bruising_gum_bleeding',
        'medical_history_breast_cancer_mass',
        'medical_history_severe_chest_pain',
        'medical_history_cough',
        'medical_history_jaundice',
        'medical_history_vaginal_bleeding',
        'medical_history_vaginal_discharge',
        'medical_history_medication',
        'medical_history_smoker',
        'medical_history_disability',
        'medical_history_disability_specify',
        'pregnancies_gravida',
        'pregnancies_para',
        'full_term',
        'premature',
        'abortion',
        'living_children',
        'last_delivery_date',
        'last_delivery_type',
        'last_menstrual_period',
        'previous_menstrual_period',
        'menstrual_flow',
        'dysmenorrhea',
        'hydatidiform_mole',
        'ectopic_pregnancy',
        'sti_discharge',
        'sti_sores',
        'sti_pain',
        'sti_treatment',
        'sti_hiv_aid_pid',
        'sti_discharge_location',
        'vaw_unpleasant_relationship',
        'vaw_partner_approval',
        'vaw_domestic_violence',
        'vaw_support',
        'vaw_support_others_specify',
        'weight',
        'blood_pressure',
        'height',
        'pulse_rate',
        'skin',
        'extremities',
        'conjunctiva',
        'neck',
        'breast',
        'abdomen',
        'pelvic_examination_normal',
        'pelvic_examination_mass',
        'pelvic_examination_abnormal_discharge',
        'pelvic_examination_cervical_abnormalities',
        'cervical_condition',
        'pelvic_examination_cervical_consistency',
        'cervical_consistency_condition',
        'pelvic_examination_cervical_tenderness',
        'pelvic_examination_adnexal_mass_tenderness',
        'pelvic_examination_uterine_position',
        'uterine_position_condition',
        'pelvic_examination_uterine_depth',
        'uterine_depth',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}