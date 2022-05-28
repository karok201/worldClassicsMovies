<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['description', 'post_id', 'user_id', 'allow'];

    public function user(): BelongsTo
    {
    	return $this->belongsTo(User::class);
    }
}
