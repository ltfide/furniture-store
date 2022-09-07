<?php 

namespace App\Repository;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
   public function getAllByCategory($keyword)
   {
      $products = Product::join('categories', 'category_id', '=', 'categories.id')
                        ->where('categories.name', $keyword)
                        ->select('products.*')
                        ->limit(4)->latest()
                        ->get();
      return $products;
   }

   public function getAll()
   {
      $products = Product::latest()->paginate(10);
      return $products;
   }
}