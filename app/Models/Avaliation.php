<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_aval',
    ];  


    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public static function avaliationOwtner($id){
        $data = User::where('id', $id)->first()->toArray();

        return $data;
    }

    public function general() {
        return $this->hasOne('App\Models\General');
    }

    public function historic() {
        return $this->hasOne('App\Models\Historic');
    }

    public function redflag() {
        return $this->hasOne('App\Models\Redflag');
    }

    public function past() {
        return $this->hasOne('App\Models\Past');
    }

    public function subjective() {
        return $this->hasOne('App\Models\Subjective');
    }

    public function exams() {
        return $this->hasMany('App\Models\Exam');
    }

    public function questionnaire() {
        return $this->hasOne('App\Models\Questionnaire');
    }

    public function dynamop() {
        return $this->hasOne('App\Models\Dynamop');
    }

    public function consults() {
        return $this->hasMany('App\Models\Consult');
    }
}
