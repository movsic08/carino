<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inventory';
    protected $fillable = [
        'item_code',
        'item_photo',
        'name',
        'stocks',
        'description',
        'availability',
    ];
    

    public function assessmentRecords()
    {
        return $this->hasMany(AssessmentRecord::class, 'contraceptive_item_id');
    }

}
