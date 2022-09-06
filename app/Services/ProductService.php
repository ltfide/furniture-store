<?php 

namespace App\Services;

interface ProductService
{
   public function getAllProduct($request);

   public function getProduct($request);
}