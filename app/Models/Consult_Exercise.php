<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult_Exercise extends Model
{
    use HasFactory;

    protected $table = 'consult_exercises';

    protected $fillable = ['serie','repeat','execution',

    ]; 

    public function exercises()
    {
    	return $this->belongsToMany(Exercise::class);
    }


    public function consult() {
        return $this->belongsTo('App\Models\Consult');
    }

    


}
