<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuary extends Model
{
    use HasFactory;

    protected $fillable = [
       'description_last_days','pain_level','pain_quality','function_improvement',
    ];  

    public function consult() {
        return $this->belongsTo('App\Models\Consult');
    }
}
