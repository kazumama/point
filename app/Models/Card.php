<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    public function points()
    {
        return $this->hasMany(Point::class);
    }
    
    public function shops()
    {
        return $this->belongsToMany('App\Shop');
    }
}
