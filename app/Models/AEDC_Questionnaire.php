<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AEDC_Questionnaire extends Model
{
    use HasFactory;


    protected $fillable = [
        'aedc_img', 'aedc_score',
    ]; 

    protected $table = "aedc_questionnaires";
    
    public function questionnaire() {
        return $this->belongsTo('App\Models\Questionnaire');
    }
}
