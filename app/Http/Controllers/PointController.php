<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Point;

class PointController extends Controller
{
 public function index(Point $point)
 {
     return view('cards/index');
 }
}
