<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Product::factory(10)->create();
        // Blog::factory(10)->create();

        Category::create([
            'name' => 'chair',
            'slug' => 'chair'
        ]);

        Category::create([
            'name' => 'sofa',
            'slug' => 'sofa'
        ]);

        Category::create([
            'name' => 'accessories',
            'slug' => 'accessories'
        ]);

        Cart::create([
            'quantity' => 2,
            'user_id' => 1,
            'product_id' => 1
        ]);

        Cart::create([
            'quantity' => 1,
            'user_id' => 1,
            'product_id' => 2
        ]);
    }
}
