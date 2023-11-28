<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'date_of_birth',
        'age',
        'gender',
        'street_number',
        'street_name',
        'barangay',
        'city_municipality',
        'province',
        'contact_number',
        'educational_attainment',
        'occupation',
        'civil_status',
        'religion',
        'spouse_last_name',
        'spouse_first_name',
        'spouse_middle_name',
        'spouse_date_of_birth',
        'spouse_age',
        'spouse_occupation',
        'number_of_children',
        'plan_more_children',
        'average_monthly_income',
        'type_of_client',
        'reason_for_fp',
        'other_reason',
        'method_accepted',
        'iud_type',
        'other_method_reason',
    ];


    public function medicalRecord()
    {
        return $this->hasOne(MedicalRecord::class);
    }
  

    public function assessmentRecords()
    {
        return $this->hasMany(AssessmentRecord::class);
    }

    public function getFullNameAttribute()
    {
        $middleName = $this->middle_name ? $this->middle_name : 'N/A';

        return "{$this->first_name} {$middleName} {$this->last_name}";
    }
    
    
}