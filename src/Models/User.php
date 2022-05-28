<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model 
{
    protected $table = 'users';
    protected $fillable = ['id', 'role_id', 'name', 'surname','email', 'profile_link', 'description','password'];

    public function comments(): HasMany
    {
    	return $this->hasMany(Comment::class);
    }

    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'subscribes', 'author_id', 'subscriber_id');
    }

    public function subscribes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'subscribes', 'subscriber_id', 'author_id');
    }

    public function userRole(): string
    {
        $roleId = $this->getAttribute('role_id');

        if ($roleId == 1) {
            return 'Admin';
        } elseif ($roleId == 2) {
            return  'Content-manager';
        } else {
            return 'Registered user';
        }
    }
}
