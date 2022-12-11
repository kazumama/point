<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barcode;
use Illuminate\Support\Facades\Auth;
use Cloudinary;

class BarcodeController extends Controller
{
    
    
    public function create(Barcode $barcode)
    {
        return view('cards/create')->with(['barcode'=>$barcode->get()]);
    }
    public function store(Barcode $barcode,Request $request,)
     {
          $input = $request['barcode'];
          $barcode['user_id'] = Auth::id();
          $barcode['barcode_path'] = Cloudinary::upload($request->file('barcode_path')->getRealPath())->getSecurePath();
          $barcode->fill($input)->save();
         return redirect('/index');
     }
}
