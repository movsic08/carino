<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssessmentRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'assessment_client_name',
        'date_of_visit',
        'assessment_code',
        'medical_findings',
        'method_accepted',
        'service_provider_name',
        'follow_up_visit_date',
        'contraceptive_item_id',
        'quantity_used',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public static function generateAssessmentCode($methodAccepted)
    {
        $currentYear = date('y');
        $currentMonth = date('m');
        $currentYearMonth = $currentYear . $currentMonth;

        // Generate a random letter
        $randomLetter = Str::random(1);

        // Generate a random two-digit number
        $randomNumber = str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);

        // Combine all parts to create the assessment code
        $assessmentCode = $methodAccepted . $currentYearMonth . $randomLetter . $randomNumber;

        return $assessmentCode;
    }

    public function contraceptiveItem()
    {
        return $this->belongsTo(Inventory::class, 'contraceptive_item_id');
    }

    
}