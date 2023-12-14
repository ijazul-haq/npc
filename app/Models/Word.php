<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
    protected $fillable = [
        'word',
        'pos',
        'stem',
        'status',
        'sentiment',
        'abuse',
        'roman',
        'meaning',
        'rank',
    ];
    /**
     * Get the editing associated with the Word
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function editing(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
