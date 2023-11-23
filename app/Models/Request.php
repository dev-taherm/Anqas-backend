<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

     protected $fillable = [
        'titel',
        'descriptions',
        'address',
        'status',
    ];

     public function customer()
{
    return $this->belongsTo(Customer::class);
}
}
