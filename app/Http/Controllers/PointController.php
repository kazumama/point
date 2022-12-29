<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use App\Models\Barcode;
use DateTime;

class PointController extends Controller
{
    public function charge(Point $point)
    {
        $card = Card::whereIn("id",Barcode::where('user_id',Auth::id())->get()->pluck('card_id'))->get();
        return view('points/charge')->with(['point'=>$point->get(),'cards'=>$card]);
    }
    
    public function pointcharge(Point $point,Request $request)
    {
          $input = $request['point'];
          $point['user_id'] = Auth::id();
          $point['used'] = 0;
          $point['point_expiration'] = new DateTime('now');
          $point['point_expiration']=$point['point_expiration']->modify('+1 years');
          $point->fill($input)->save();
          
         return redirect('/index');
    }
}
