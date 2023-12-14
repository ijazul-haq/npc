<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    use HasFactory;
    protected $fillable = [
        'sentence',
    ];
    /**
     * Get the editing associated with the Word
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
}
