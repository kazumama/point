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
    
    protected $fillable = [
        'card_id',
        'point_charge',
    ];
        protected $dates =[
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
