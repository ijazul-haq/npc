<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vulgar extends Model
{
    use HasFactory;
    protected $table = 'vulgar';
    protected $fillable = [
        'word_id',
        'word',
        'not_vulgar',
        'slightly_vulgar',
        'vulgar',
        'very_vulgar',
        'extremely_vulgar',
    ];
}
