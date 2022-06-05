<?php

namespace App\Http\Controllers;
use App\Models\Agend;
use Illuminate\Http\Request;

class AgendController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Agend::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('agend');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Agend::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

            if($request->type == 'update')
    		{
    			$event = Agend::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

            if($request->type == 'delete')
    		{
    			$event = Agend::find($request->id)->delete();

    			return response()->json($event);
    		}
        }
    }  
   
}
