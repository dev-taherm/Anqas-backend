<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;


      protected $fillable = [
        "name",
        "descriptions",
    ];

       public function category()
{
    return $this->belongsTo(Category::class);
}
       public function requests()
{
    return $this->hasMany(Request::class);
}

     public function services()
{
    return $this->hasMany(Service::class);
}
}
