<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    protected $table = 'subscribes';
    protected $fillable = ['subscriber_id', 'author_id'];
}
