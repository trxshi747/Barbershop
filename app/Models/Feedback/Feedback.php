<?php

namespace App\Models\Feedback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Feedback extends Model
{
    use HasFactory;

    protected $table = "feedbacks";


    protected $fillable = ['rate', 'comment', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
