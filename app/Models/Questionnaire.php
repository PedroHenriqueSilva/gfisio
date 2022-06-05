<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    public function avaliation() {
        return $this->belongsTo('App\Models\Avaliation');
    }

    public function csi_questionnaire() {
        return $this->hasOne('App\Models\CSI_Questionnaire');
    }

    public function fabq_questionnaire() {
        return $this->hasOne('App\Models\FABQ_Questionnaire');
    }

    public function etc_questionnaire() {
        return $this->hasOne('App\Models\ETC_Questionnaire');
    }

    public function aedc_questionnaire() {
        return $this->hasOne('App\Models\AEDC_Questionnaire');
    }

    public function bpcs_questionnaire() {
        return $this->hasOne('App\Models\BPCS_Questionnaire');
    }
}
