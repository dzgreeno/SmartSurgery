<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'maiden_name', 'birth_date', 'gender',
        'blood_type', 'address', 'phone', 'insurance_number', 'insurance_type',
        'admission_number', 'department_id', 'room', 'bed', 'status',
        'admission_date', 'discharge_date', 'notes',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'admission_date' => 'date',
        'discharge_date' => 'date',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function surgeries()
    {
        return $this->hasMany(Surgery::class);
    }

    public function medicationLogs()
    {
        return $this->hasMany(MedicationLog::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
