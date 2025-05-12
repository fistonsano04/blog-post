<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author',
        'image',
        'category',
        'tags',
        'is_published',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }
}
