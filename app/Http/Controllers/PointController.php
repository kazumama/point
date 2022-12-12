<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    public function charge(Point $point,Card $card)
    {
        return view('points/charge')->with(['point'=>$point->get(),'cards'=>$card->get()]);
    }
    
    public function pointcharge(Point $point,Request $request)
    {
          $input = $request['point'];
          $point['user_id'] = Auth::id();
          $point['used'] = 0;
          $point->fill($input)->save();
          
         return redirect('/index');
    }
}
