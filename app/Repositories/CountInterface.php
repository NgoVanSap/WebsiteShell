<?php
namespace App\Repositories;


interface CountInterface
{

   public function getCountProduct();
   public function getSearchHighDownProduct();
   public function getSearchSizeProduct($size);

}
