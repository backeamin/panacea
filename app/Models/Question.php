<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relation Ship with ModelTest table
    public function model_test()
    {
        return $this->belongsTo(ModelTest::class);
    }
}
