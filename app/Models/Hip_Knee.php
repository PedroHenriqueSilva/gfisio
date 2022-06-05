<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hip_Knee extends Model
{
    use HasFactory;

    protected $fillable = [
        'right_hip_extension', 'left_hip_extension', 'right_hip_flexion',  'left_hip_flexion',
        'right_hip_abduction', 'left_hip_abduction', 'right_hip_adduction','left_hip_adduction',
        'right_knee_flexion','left_knee_flexion','right_knee_extension','left_knee_extension',
        
    ];  
    protected $table = "hips_knees";

    public function dynamop() {
        return $this->belongsTo('App\Models\Dynamop');
    }
}
