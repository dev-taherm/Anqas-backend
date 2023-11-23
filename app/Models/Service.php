<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
  protected $fillable = [
        'titel',
        'descriptions',
        'address',
        'status',
    ];

         public function seller()
{
    return $this->belongsTo(Seller::class);
}
}
