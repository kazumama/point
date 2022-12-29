<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Point extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    public $fillable = [
        'user_id',
        'card_id',
        'point_charge',
        'point_expiration',
        'used',
    ];
    public $dates =[
        'point_expiration',
     ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
