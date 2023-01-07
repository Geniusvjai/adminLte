<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSubscribe extends Model
{
    use HasFactory;
    protected $table = 'web_subscribed';
    protected $fillable = ['email_id'];
}
