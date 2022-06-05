<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ankle extends Model
{
    use HasFactory;

    protected $fillable = [
        'right_plantar_flexion', 'left_plantar_flexion', 'right_dorsiflexion',  'left_dorsiflexion',
        'right_inversion', 'left_inversion', 'right_eversion','left_eversion',
        
    ];  

    public function dynamop() {
        return $this->belongsTo('App\Models\Dynamop');
    }

}
