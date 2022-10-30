<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
       'emailCus',
       'usernameCus',
       'password',
       're_passwordCus',
       'phoneCus',
    ];

    // public function comment() {

    //     return $this->hasMany(UserComment::class,'comment_user_id','id');

    // }
}
