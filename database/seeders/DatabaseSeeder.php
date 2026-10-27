<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@toko.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Staff',
            'email' => 'staff@toko.test',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);

        $skincare = Category::create(['name' => 'Skincare']);
        $makanan = Category::create(['name' => 'Makanan']);

        Supplier::create([
            'name' => 'PT Sumber Kecantikan',
            'phone' => '081234567890',
            'address' => 'Jl. Merdeka No. 1',
        ]);
        Supplier::create([
            'name' => 'CV Roti Sejahtera',
            'phone' => '081298765432',
            'address' => 'Jl. Pasar Baru No. 5',
        ]);

        Product::create([
            'category_id' => $skincare->id,
            'name' => 'Face Wash',
            'sku' => 'SKN-001',
            'purchase_price' => 20000,
            'selling_price' => 30000,
            'stock' => 20,
            'minimum_stock' => 5,
        ]);
        Product::create([
            'category_id' => $skincare->id,
            'name' => 'Toner',
            'sku' => 'SKN-002',
            'purchase_price' => 25000,
            'selling_price' => 40000,
            'stock' => 15,
            'minimum_stock' => 5,
        ]);
        Product::create([
            'category_id' => $makanan->id,
            'name' => 'Roti',
            'sku' => 'MKN-001',
            'purchase_price' => 5000,
            'selling_price' => 8000,
            'stock' => 3,
            'minimum_stock' => 10,
        ]);
    }
}