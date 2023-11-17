<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
