<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users_test extends Authenticatable
{
    use HasFactory;

    protected $table = 'users_tests';
    // protected $guarded = 'admin';
    protected $fillable = ['id','role','name','email','number','password','image'];
}
