<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

        public function category()
{
    return $this->belongsTo(Category::class);
}

    public function requests()
{
    return $this->belongsToMany(Request::class);
}

    public function services()
{
    return $this->belongsToMany(Service::class);
}
}
