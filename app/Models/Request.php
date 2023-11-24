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

     public function offers()
{
    return $this->hasMany(Offer::class);
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
