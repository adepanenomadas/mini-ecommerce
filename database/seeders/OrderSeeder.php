<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();

        if ($users->isEmpty()) {
            return;
        }

        foreach ($users as $user) {
            \App\Models\Order::factory()->count(rand(1, 2))->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
