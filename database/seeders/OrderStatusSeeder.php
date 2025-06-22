<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderStatuses = [
            'Waiting for Payment' => 'Order selesai dibuat dan menunggu pembayaran',
            'Paid' => 'Pembayaran telah dilakukan',
            'Processing' => 'Pesanan sedang diproses',
            'Shipped' => 'Pesanan telah dikirim',
            'Completed' => 'Pesanan telah selesai',
            'Cancelled' => 'Pesanan telah dibatalkan',
        ];
        foreach ($orderStatuses as  $status => $description) {
            OrderStatus::create([
                'name' => $status,
                'description' => $description,
            ]);
        }
    }
}
