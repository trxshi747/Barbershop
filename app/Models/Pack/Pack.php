<?php

namespace App\Models\Pack;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    use HasFactory;

    protected $table = "packs";

    protected $fillable = [
        "name",
        "description",
        "image",
        "price",
        "duration"
    ];

    public $timestamps = true;
}

