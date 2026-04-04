<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'medication_id', 'department_id',
        'nurse_name', 'dose', 'route', 'administered_at', 'notes',
    ];

    protected $casts = [
        'administered_at' => 'datetime',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
