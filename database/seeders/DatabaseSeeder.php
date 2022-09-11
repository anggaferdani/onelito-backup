<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\EventFish;
use App\Models\KoiStock;
use App\Models\Member;
use App\Models\Product;
use App\Models\ProductCategory;
use Database\Factories\ProductCategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Member::factory()->create([
        //     'email' => 'rifqi@gmail.com',
        //     'password' => 'rifqi'
        // ]);

        // ProductCategory::factory()->create([
        //     'kategori_produk' => ProductCategory::PERLENGKAPAN_IKAN,
        // ]);

        // ProductCategory::factory()->create([
        //     'kategori_produk' => ProductCategory::MAKANAN_IKAN,
        // ]);

        // ProductCategory::factory()->create([
        //     'kategori_produk' => ProductCategory::IKAN,
        // ]);

        Product::factory(60)->create();

        // Admin::factory()->create([
        //     'username' => 'admin',
        //     'password' => 'admin2022'
        // ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
