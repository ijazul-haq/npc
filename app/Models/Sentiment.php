<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentiment extends Model
{
    use HasFactory;
    protected $fillable = [
        'word_id',
        'word',
        'neutral',
        'hapiness',
        'sadness',
        'fear',
        'disgust',
        'anger',
        'surprise',
    ];
}
