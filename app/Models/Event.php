<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'participants', 'event_location', 'start_date', 'end_date'];

    protected $dates = ['start_date', 'end_date'];


}
