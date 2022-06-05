<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Consult;
use App\Models\Avaliation;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard(){
        
        $patientes = User::where('role', 'paciente')->count();
        $consults = Consult::count();
        $avaliations = Avaliation::count();
        return view('dashboard',['patientes' => $patientes, 'consults'=>$consults, 'avaliations'=>$avaliations]);
    }
}
