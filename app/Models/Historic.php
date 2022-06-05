<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_diagnostic','medication','complaint','story',
    ];  

    public function avaliation() {
        return $this->belongsTo('App\Models\Avaliation');
    }
}
