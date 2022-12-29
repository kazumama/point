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
    
    public function pointcharge(Point $point,Request $request, Card $card)
    {
          $point2 = new Point();
          $input = $request['point'];
          $input['user_id'] = Auth::id();
          $input['point_expiration'] = new DateTime('now');
          $input['point_expiration']=$input['point_expiration']->modify('+1 years');
          $input['used'] = 0;
          $charge_point = $input;
          while($charge_point['point_charge']<0){
              
              $puls = Point::where("user_id",Auth::id())->where("card_id",$charge_point['card_id'])->where("used",0)->orderBy("point_expiration","ASC")->first();
              if(empty($puls)){
                  $point->fill($charge_point)->save();
                  return redirect('/index');
              }
              $charge = $charge_point['point_charge'];
              $charge = $charge+$puls->point_charge;
             
              $puls['used'] = 1;
              $puls->save();
              $charge_point['point_charge'] = $charge;
              
              if($charge_point['point_charge']>=0){
                  $charge_point['point_expiration'] = $puls['point_expiration'];
                  $input['used'] = 1;
                  $point2->fill($input)->save();
              }
              
          }
          
          
          $point->fill($charge_point)->save();
          
         return redirect('/index');
    }
}
