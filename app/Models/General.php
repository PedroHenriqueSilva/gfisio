<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_aval','age','weight','height','imc', 'job_description', 'repeated_movements',
        'demand_physical_psycho','worse_clinical_work','leisure', 'physical_activity' ,
        'physical_activity_time' , 'discomfort_physical_activity' ,
    ];
      

    public function avaliation() {
        return $this->belongsTo('App\Models\Avaliation');
    }
}
