<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homograph extends Model
{
    use HasFactory;
    protected $fillable = [
        'original_tag',
        'new_tag',
        'word',
        'sent_id',
    ];
//     public function sentences()
//     {
//         return $this->hasMany('App\Models\Sentence');
//     }
}
