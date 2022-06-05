<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FABQ_Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'fabq_img', 'fabq_score',
    ]; 

    protected $table = "fabq_questionnaires";
    
    public function questionnaire() {
        return $this->belongsTo('App\Models\Questionnaire');
    }
}
