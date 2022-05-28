<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{
    protected $table = 'posts';
    protected $fillable = ['user_id', 'title', 'description',];

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class)->where('allow', '=','1');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
