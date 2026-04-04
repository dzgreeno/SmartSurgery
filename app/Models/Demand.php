<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name', 'surgery_type', 'description',
        'requested_date', 'status', 'admin_notes',
    ];

    protected $casts = [
        'requested_date' => 'date',
    ];
}
