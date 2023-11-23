<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Seller extends Model
{
    use HasFactory;
 protected $fillable = [
        'o_username',
        'o_name',
        'o_address',
        'o_city',
        'o_phone',
        'o_bio'
    ];
     public function user()
{
    return $this->belongsTo(User::class);
}

         public function services()
{
    return $this->hasMany(Service::class);
}

         public function offer()
{
    return $this->hasMany(Offer::class);
}

}
