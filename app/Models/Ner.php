<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ner extends Model
{
    use HasFactory;
    protected $table = 'ner';
    protected $fillable = [
        'word_id',
        'word',
        'location',
        'person',
        'other',
    ];
}
