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
     public function index(Card $card,Point $point)
     {
         return view('cards/index')->with(['cards'=>$card->get(),'point'=>$point->get()]);
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
         return view('cards/show')->with(['card'=>$card]);
     }
     
     public function store(Request $request,Barcode $barcode)
     {
          $input = $request['barcode'];
          $barcode['user_id'] = Auth::id();
          $barcode['barcode_path'] = Cloudinary::upload($request->file('barcode_path')->getRealPath())->getSecurePath();
          $barcode->fill($input)->save();
         return redirect('/');
     }
     
      public function cardstore(Request $request,Card $card)
     {
          dd($card);
          $input = $request['card'];
          $card['image_path'] = Cloudinary::upload($request->file('image_path')->getRealPath())->getSecurePath();
          $card->fill($input)->save();
         return redirect('/');
     }
}
