<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Force extends Model
{
    use HasFactory;

    protected $fillable = [

    ];  

    public function avaliation() {
        return $this->belongsTo('App\Models\Avaliation');
    }

    public function shoulder() {
        return $this->hasOne('App\Models\Shoulder');
    }
}
