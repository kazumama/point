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
    public function store(Request $request,Barcode $barcode)
     {
         
         $image_url = Cloudinary::upload($request->file('barcode_path')->getRealPath())->getSecurePath();
         return redirect('/');
     }
}
