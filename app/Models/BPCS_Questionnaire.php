<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BPCS_Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'bpcs_img', 'bpcs_score',
    ]; 

    protected $table = "bpcs_questionnaires";
    
    public function questionnaire() {
        return $this->belongsTo('App\Models\Questionnaire');
    }
}
