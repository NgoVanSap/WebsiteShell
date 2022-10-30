<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $table = 'wish_lists';

    protected $fillable = [
        'wish_list_product_id',
        'wish_list_user_id',
    ];
}
