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

    public function orders()
{
    return $this->hasMany(Order::class);
}

    public function subcategory()
{
    return $this->belongsToMany(Subcategory::class);
}
        public function tags()
{
    return $this->belongsToMany(Tag::class);
}
}
