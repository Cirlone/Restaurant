<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name', 'phone', 'date', 'time', 'guests', 'notes'
    ];
    protected $casts = [
        'date'   => 'date',
        'time'   => 'datetime:H:i',
        'guests' => 'integer',
    ];
    //use HasFactory;
   
}