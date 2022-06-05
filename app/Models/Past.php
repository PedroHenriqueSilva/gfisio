<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Past extends Model
{
    use HasFactory;

    protected $fillable = [
        'drink','drink_descr','smoke','smoke_descr', 'diabetes', 'diabetes_descr', 'has', 'has_descr', 'cholesterol', 'cholesterol_descr',
        'heart', 'heart_descr', 'pulmonary', 'pulmonary_descr', 'renal', 'renal_descr', 'gastrointestinal', 'gastrointestinal_descr',
        'neurological', 'neurological_descr', 'psychological', 'psychological_descr', 'rheumatological', 'rheumatological_descr', 
        'vascular', 'vascular_descr', 'mammary', 'mammary_descr', 'uterus', 'uterus_descr', 'scrotum', 'scrotum_descr',
        'thyroid', 'thyroid_descr', 'covid19', 'covid19_descr', 'fracture', 'fracture_descr', 'historical_ca', 'hist_ca_descr',
        'hist_family_ca', 'hist_family_ca_descr', 'historical_surgeries', 'hist_surgeries_descr',
    ];  

    public function avaliation() {
        return $this->belongsTo('App\Models\Avaliation');
    }
}
