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
        $points = Point::where("user_id",Auth::id())->where("used",0)->select('card_id')->selectRaw('SUM(point_charge) as charge')->groupBy('card_id')->get();
         $cards = Card::whereIn("id",Barcode::where('user_id',Auth::id())->get()->pluck('card_id'))->get();
         
         foreach($cards as $card){
             foreach($points as $point){
                 if($point->card_id===$card->id){
                     $card -> point = $point->charge;
                     break;
                 }
             }
             
             
         }
        
         
        return view('cards/index')->with(['cards'=>$cards]);
        
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
          $exp =  Point::where("user_id",Auth::id())->where("card_id",$card->id)->where("used",0)->orderBy("point_expiration","ASC")->first();
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
     
      public function shop(){
         
         $api_key = config('app.api_key');
         return view('cards/shop')->with(['api_key'=>$api_key]);
     }
}
