<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'data_nasc',
        'sex',
        'end',
        'state',
        'city',
        'phone',
        'profission',
        'civil_status',
        'sons',
        'dominant_side',
        'email',
        'patient_id',
    ];

    public function avaliations() {
        return $this->hasMany('App\Models\Avaliation');
    }

    protected $date = 'DD/MM/YYYY';
}
