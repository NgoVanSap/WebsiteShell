<?php
namespace App\Repositories;


interface CartInterface
{

    public function getViewCartList();
    public function totalCheckout();

}
