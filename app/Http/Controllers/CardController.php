<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Cloudinary;

class CardController extends Controller
{
     public function index(Card $card)
     {
         return view('cards/index')->with(['cards'=>$card->get()]);
     }
     
     public function create(Card $card)
     {
         return view('cards/create')->with(['cards'=>$card->get()]);
     }
     
     public function show(Card $card)
     {
         return view('cards/show')->with(['card'=>$card]);
     }
     
     public function store(Request $request,Card $card)
     {
         $input = $request['card'];
         $card->fill($input)->save();
         $image_url = Cloudinary::upload($request->file('barcode_path')->getRealPath())->getSecurePath();
         return redirect('/');
     }
}
