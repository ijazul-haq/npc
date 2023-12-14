<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editing extends Model
{
    use HasFactory;
    protected $fillable = [
        'word_id',
        'user_id',
    ];
    /**
     * Get the user that owns the Editing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get the user that owns the Editing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function word(): BelongsTo
    {
        return $this->belongsTo(Word::class, 'word_id');
    }
}
