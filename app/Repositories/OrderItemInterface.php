<?php

namespace App\Repositories;
use App\Models\billCart;


interface OrderItemInterface
{
    public function getOrderItems($id);

}

