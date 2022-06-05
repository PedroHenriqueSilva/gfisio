<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redflag extends Model
{
    use HasFactory;

    protected $fillable = [
        'fever','fever_descr','fallen','fallen_descr','dizziness','dizziness_descr',
        'dif_walking','dif_walking_descr','notura_pain','notura_pain_descr','stiffness',
        'stiffness_descr','weight_loss','weight_loss_descr', 'faint_descr','formication','formication_descr',
        'tiredness','tiredness_descr','endless_pain','endless_pain_descr','urinary_dysfunction','urinary_dysfunction_descr',
        'intestinal_dysfunction','intestinal_dysfunction_descr','sexual_dysfunction','sexual_dysfunction_descr',
    ];  

    public function avaliation() {
        return $this->belongsTo('App\Models\Avaliation');
    }
}
