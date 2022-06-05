<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_aval','date_consult',
    ];  

    public function avaliation() {
        return $this->belongsTo('App\Models\Avaliation');
    }

    public function prontuary() {
        return $this->hasOne('App\Models\Prontuary');
    }

    public function exercises() {
        return $this->belongsToMany('App\Models\Exercise', 'consult_exercises');
    }
}
