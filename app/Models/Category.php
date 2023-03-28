<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
//    Relation with Product Table//
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
