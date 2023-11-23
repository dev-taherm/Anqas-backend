<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'address',
        'city',
        'phone',
        'bio'
    ];
 public function user()
{
    return $this->belongsTo(User::class);
}

 public function request()
{
    return $this->hasMany(Request::class);
}

         public function order()
{
    return $this->hasMany(Order::class);
}
}
