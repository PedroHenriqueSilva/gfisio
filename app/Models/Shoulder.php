<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoulder extends Model
{
    use HasFactory;

    
    protected $fillable = [
            'right_flexion','left_flexion','right_extension','left_extension','right_external_rotation',
           'left_external_rotation','right_internal_rotation','left_internal_rotation','right_abduction',
            'left_abduction','push_right_horizontal_arm','push_left_horizontal_arm','push_right_vertical_arm',
            'push_left_vertical_arm','right_pull','left_pull',

        ];  

        public function dynamop() {
            return $this->belongsTo('App\Models\Dynamop');
        }

      
}
