<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image',
        'category',
        'tags',
        'is_published',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
