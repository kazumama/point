<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Barcode;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;
use Cloudinary;

class CardController extends Controller
{
     public function index(Card $card)
     {
        $points = Point::where("user_id",Auth::id())->select('card_id')->selectRaw('SUM(point_charge) as charge')->groupBy('card_id')->first();
        return view('cards/index')->with(['points'=>$points,'cards'=>$card->get()]);
        
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
          dd($barcode);
          $point = Point::where("user_id",Auth::id())->where("card_id",$card->id)->selectRaw('SUM(point_charge) as charge')->first();
          
         return view('cards/show')->with(['card'=>$card,'point'=>$point,'barcode'=>$barcode]);
     }
     
     // public function store(Barcode $barcode,Request $request,)
     // {
     //      $input = $request['barcode'];
     //      $barcode['user_id'] = Auth::id();
     //      $barcode['barcode_path'] = Cloudinary::upload($request->file('barcode_path')->getRealPath())->getSecurePath();
     //      $barcode->fill($input)->save();
     //    return redirect('/');
     // }
     
      public function cardstore(Card $card,Request $request)
     {
          $input = $request['card'];
          $card['image_path'] = Cloudinary::upload($request->file('image_path')->getRealPath())->getSecurePath();
          $card->fill($input)->save();
         return redirect('/cards/cardcreate');
     }
}
