<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    use HasFactory;
    protected $table='checkups';
    protected $fillable = [
        'id',
        'patient_id',
        'time',
        'gender',
        'age',
        'history_and_symptoms',
        'chinese_diagnosis',
        'western_diagnosis',
        'process',
        'acupuncture',
        'base',
        'physique',
        'test_id',
        'patient_condition_score',
        'prescribed_medicines',

    ];
    /**
     * Get the editing associated with the Word
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
}
