<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

     protected $fillable = [
        'titel',
        'descriptions',
        'price',
        'status',
    ];



         public function seller()
{
    return $this->belongsTo(Seller::class);
}

         public function request()
{
    return $this->belongsTo(Request::class);
}
}
