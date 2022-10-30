<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    use HasFactory;

    protected $table = 'user_comments';

    protected $fillable = [
        'comment_user_id',
        'comment_product_id',
        'comment_user_name',
        'comment_user_email',
        'comment_information',
    ];

    public function product() {

        return $this->belongsTo(Product::class,'comment_product_id','id');

    }

    // public function customer() {

    //     return $this->belongsTo(Customer::class,'comment_user_id');

    // }
}
