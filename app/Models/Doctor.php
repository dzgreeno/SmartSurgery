<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'firebase_uid', 'first_name', 'last_name', 'specialty',
        'department_id', 'phone', 'experience_years', 'grade', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function surgeries()
    {
        return $this->hasMany(Surgery::class, 'doctor_name', 'last_name');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function getFullNameAttribute()
    {
        return 'د. ' . $this->first_name . ' ' . $this->last_name;
    }
}
