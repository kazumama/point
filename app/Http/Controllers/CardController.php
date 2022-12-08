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
     
     public function show(Card $card)
     {
         return view('cards/show')->with(['card'=>$card]);
     }
     
     public function store(Request $request,Card $card,Barcode $barcode)
     {
          //$input = $request['card'];
          //$card->fill($input)->save();
          $image_url = Cloudinary::upload($request->file('barcode_path')->getRealPath())->getSecurePath();
          dd($image_url);
         return redirect('/');
     }
}
