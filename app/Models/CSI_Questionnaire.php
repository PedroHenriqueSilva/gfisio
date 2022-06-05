<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSI_Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'csi_img', 'csi_score',
    ]; 

    protected $table = "csi_questionnaires";
    
    public function questionnaire() {
        return $this->belongsTo('App\Models\Questionnaire');
    }
}
