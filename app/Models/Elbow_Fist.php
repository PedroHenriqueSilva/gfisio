<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elbow_Fist extends Model
{
    use HasFactory;

    protected $fillable = [
        'right_elbow_flexion', 'left_elbow_flexion', 'right_elbow_extension',  'left_elbow_extension',
        'right_fist_flexion', 'left_fist_flexion', 'right_fist_extension','left_fist_extension',
        'right_supination','left_supination','right_pronation','left_pronation',
        
    ];  
    protected $table = "elbows_fists";

    public function dynamop() {
        return $this->belongsTo('App\Models\Dynamop');
    }
}
