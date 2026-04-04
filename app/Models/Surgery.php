<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name', 'doctor_name', 'surgery_date', 'surgery_time',
        'room', 'department_id', 'patient_id', 'doctor_uid',
        'status', 'notes',
    ];

    protected $casts = [
        'surgery_date' => 'date',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}