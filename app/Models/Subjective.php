<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjective extends Model
{
    use HasFactory; 

    protected $fillable = [
        'subjective_img','subjective_scale','subjective_characteristic','subjective_spatial_location',
        'subjective_description',
    ];  

    public function avaliation() {
        return $this->belongsTo('App\Models\Avaliation');
    }
}
