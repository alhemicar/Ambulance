<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalExam extends Model
{
    protected $fillable = [
        'patient_id', 'date', 'doctor_id', 'diagnose', 'finished',
    ];

    public function patient() {
        return $this->belongsTo('App\Patient');
    }

    public function doctor() {
        return $this->belongsTo('App\User');
    }
}
