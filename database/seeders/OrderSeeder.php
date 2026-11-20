<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        if ($products->isEmpty()) return;

        $cake = $products->where('slug', 'chocolate-dream-cake')->first() ?? $products->first();
        $croissant = $products->where('slug', 'butter-croissant')->first() ?? $products->skip(1)->first();
        $cookie = $products->where('slug', 'choco-cookies')->first() ?? $products->skip(2)->first();

        // Order 1 (matching checkout & cart mockup!)
        $order1 = Order::create([
            'order_number' => 'NVL-20261120-001',
            'customer_name' => 'Neyla Vega',
            'customer_phone' => '081234567890',
            'customer_address' => 'Jl. Melati No. 123',
            'customer_city' => 'Jakarta',
            'customer_postal_code' => '12345',
            'payment_method' => 'midtrans',
            'subtotal' => 160000,
            'shipping_cost' => 15000,
            'grand_total' => 175000,
            'status' => 'completed',
            'notes' => 'Tolong lilin ulang tahun dan pisau kue ya.',
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => $cake->id,
            'product_name' => $cake->name,
            'price' => $cake->price,
            'quantity' => 1,
            'subtotal' => $cake->price * 1,
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => $croissant->id,
            'product_name' => $croissant->name,
            'price' => $croissant->price,
            'quantity' => 1,
            'subtotal' => $croissant->price * 1,
        ]);

        // Seed other dummy orders to reach 18 orders & ~Rp 3.500.000 revenue
        $names = ['Anindya Saraswati', 'Reza Pratama', 'Dinda Maharani', 'Budi Santoso', 'Siti Rahma', 'Dimas Anggara', 'Rina Wulandari', 'Fajar Nugraha', 'Maya Safitri', 'Kevin Wijaya', 'Tika Puspita', 'Ahmad Fauzi', 'Dewi Lestari', 'Yoga Permana', 'Clarissa Putri', 'Rizky Ramadhan', 'Nadya Putri'];
        $paymentMethods = ['midtrans', 'transfer', 'cod'];

        foreach ($names as $idx => $name) {
            $num = str_pad($idx + 2, 3, '0', STR_PAD_LEFT);
            $p = $products->random();
            $qty = rand(1, 3);
            $sub = $p->price * $qty;
            $ship = 15000;
            $grand = $sub + $ship;

            $order = Order::create([
                'order_number' => 'NVL-20261120-' . $num,
                'customer_name' => $name,
                'customer_phone' => '0812987' . rand(10000, 99999),
                'customer_address' => 'Jl. Mawar No. ' . rand(1, 100),
                'customer_city' => 'Jakarta Selatan',
                'customer_postal_code' => '12' . rand(100, 999),
                'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                'subtotal' => $sub,
                'shipping_cost' => $ship,
                'grand_total' => $grand,
                'status' => ($idx % 4 == 0) ? 'pending' : 'completed',
                'notes' => 'Pesanan kue segar',
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $p->id,
                'product_name' => $p->name,
                'price' => $p->price,
                'quantity' => $qty,
                'subtotal' => $sub,
            ]);
        }
    }
}
