<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ETC_Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'etc_img', 'etc_score',
    ]; 

    protected $table = "etc_questionnaires";
    
    public function questionnaire() {
        return $this->belongsTo('App\Models\Questionnaire');
    }
}
