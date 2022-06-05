<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dynamop;
use App\Models\Shoulder;
use App\Models\Hip_Knee;
use App\Models\Elbow_Fist;
use App\Models\Ankle;
use App\Models\Avaliation;
use App\Models\User;


class DynamopController extends Controller
{
    public function info($id) {

        $avaliation = Avaliation::where('id', $id)->first()->toArray();

        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

         //verificar se existe dynamop cadastrado
         $dynamop = Dynamop::where('avaliation_id', $id)->first();
      
         if(is_null($dynamop)){
             $dynamop = "false";
             $shoulder = "false";
             $hip_knee = "false";
             $elbow_fist = "false";
             $ankle = "false";
         }
         else{
             $dynamop = $dynamop->toArray();

                //verificar se existe shoulder cadastrado
                $shoulder = Shoulder::where('dynamop_id', $dynamop['id'])->first();

                if(is_null($shoulder)){
                $shoulder = "false";
                }
                else{
                    $shoulder = $shoulder->toArray();
                    
                }

                //verificar se existe hip_knee cadastrado
                $hip_knee = Hip_Knee::where('dynamop_id', $dynamop['id'])->first();

                if(is_null($hip_knee)){
                    $hip_knee = "false";
                }
                else{
                    $hip_knee = $hip_knee->toArray();
               }

                //verificar se existe hip_knee cadastrado
                $elbow_fist = Elbow_Fist::where('dynamop_id', $dynamop['id'])->first();

                if(is_null($elbow_fist)){
                $elbow_fist = "false";
                }
                else{
                    $elbow_fist = $elbow_fist->toArray();

                }

                //verificar se existe ankle cadastrado
                $ankle = Ankle::where('dynamop_id', $dynamop['id'])->first();

                if(is_null($ankle)){
                    $ankle = "false";
                }
                else{
                    $ankle = $ankle->toArray();
                    
                }
                
                        
            }

        
        return view('dynamop.info',['avaliation' => $avaliation, 'avaliationOwtner' => $avaliationOwtner, 'dynamop'=>$dynamop, 'shoulder'=>$shoulder, 'hip_knee'=>$hip_knee, 'elbow_fist'=>$elbow_fist, 'ankle'=>$ankle]);

    }
    
    
    public function store($id) {

        $dynamops = new Dynamop;
        
        $dynamops->avaliation_id = $id;
        
        $dynamops->save();
        
        return redirect()
            ->route('dynamop.info', $id)
            ->with('msg', 'Dynamop cadastrado com sucesso!');
    }
}
