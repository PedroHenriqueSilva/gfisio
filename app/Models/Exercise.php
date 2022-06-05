<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'exercise_name','exercise_description','exercise_specialty','exercise_body_area',
        'exercise_objective','exercise_equipment','exercise_video',
        
    ];  

    public function consults() {
        return $this->belongsToMany('App\Models\Consult', 'consult_exercises');
    }

    public function consults_exercises() {
        return $this->hasMany('App\Models\Consult_Exercise');
    }

}
