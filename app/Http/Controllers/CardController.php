<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Barcode;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;
use Cloudinary;
use Carbon\Carbon;

class CardController extends Controller
{
     public function index()
     {
        $points = Point::where("user_id",Auth::id())->select('card_id')->selectRaw('SUM(point_charge) as charge')->groupBy('card_id')->get();
        $pointsarray=$points->toArray();
        $pointsarraynew=[];
        foreach($pointsarray as $value){
            
              $pointsarraynew[$value['card_id']]=$value['charge'];
            
        };
         $cards = Card::whereIn("id",Barcode::where('user_id',Auth::id())->get()->pluck('card_id'))->get();
         
         foreach($cards as $card){
             
             $card -> point = $points[$card->id];
             
         }
         
        return view('cards/index')->with(['cards'=>$cards, 'pointsarray'=>$pointsarraynew]);
        
     }
     
     public function create(Card $card,Barcode $barcode)
     {
         return view('cards/create')->with(['cards'=>$card->get(),'barcode'=>$barcode->get()]);
     }
     
     public function cardcreate(Card $card)
     {
         return view('cards/cardcreate')->with(['card'=>$card->get()]);
     }
     
     public function show(Card $card)
     {
          $barcode = Barcode::where("user_id",Auth::id())->where("card_id",$card->id)->first();
          $exp =  Point::where("user_id",Auth::id())->where("card_id",$card->id)->where("used",0)->orderBy("point_expiration","DESC")->first();
          $point = Point::where("user_id",Auth::id())->where("card_id",$card->id)->selectRaw('SUM(point_charge) as charge')->first();
          
         return view('cards/show')->with(['card'=>$card,'point'=>$point,'barcode'=>$barcode,'exp'=>$exp]);
     }
     
      public function cardstore(Card $card,Request $request)
     {
          $input = $request['card'];
          $card['image_path'] = Cloudinary::upload($request->file('image_path')->getRealPath())->getSecurePath();
          $card->fill($input)->save();
         return redirect('/cards/cardcreate');
     }
}
