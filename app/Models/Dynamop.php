<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dynamop extends Model
{
    use HasFactory;

    public function avaliation() {
        return $this->belongsTo('App\Models\Avaliation');
    }

    public function hip_knee() {
        return $this->hasOne('App\Models\Hip_Knee');
    }

    public function shoulder() {
        return $this->hasOne('App\Models\Shoulder');
    }

    public function ankle() {
        return $this->hasOne('App\Models\Ankle');
    }
}
