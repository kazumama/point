<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Point extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable = [
        'card_id',
        'point_charge',
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
