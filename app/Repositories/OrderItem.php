<?php
namespace App\Repositories;
use App\Models\billCart;

class OrderItem implements OrderItemInterface
{

    public function getOrderItems($id)
    {
        return billCart::where('id', $id)->first();
    }


}
