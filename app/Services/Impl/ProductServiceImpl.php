<?php 

namespace App\Services\Impl;

use App\Models\Product;
use App\Repository\ProductRepository;
use App\Services\ProductService;

class ProductServiceImpl implements ProductService
{
   private ProductRepository $productRepository;

   public function __construct(ProductRepository $productRepository) {
      $this->productRepository = $productRepository;
   }

   public function getAllProduct($request)
   {
      $result = $this->productRepository->getAll();
      if ($request) {
         $result = $this->productRepository->getAllByCategory($request);
      }

      return $result;
   }

   public function getProduct($request)
   {
      
   }
}