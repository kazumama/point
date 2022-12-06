<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    public function index(Point $point)
    {
        return view('cards/index');
    }
    
    public function charge(Point $point)
    {
        return view('points/charge')->with(['point'=>$point->get()]);
    }
}
