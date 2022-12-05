<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;


class CardController extends Controller
{
     public function index(Card $card)
     {
         
         return view('cards/index')->with(['cards'=>$card->get()]);
     }
     
      public function show(Card $card)
     {
         return view('cards/show')->with(['cards'=>$card->get()]);
     }
}
