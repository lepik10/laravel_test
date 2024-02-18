<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         $user = \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

         $amount_total = 0;

        \App\Models\UserOperation::factory(20)
            ->sequence(function(Sequence $sequence) use (&$amount_total) {
                $amount_random = rand(0, 1000);
                $amount_total += $amount_random;
                return [
                    'amount' => $amount_random
                ];
            })
            ->create([
                'user_id' => $user->id
            ]);

        \App\Models\UserBalanсe::factory()->create([
            'user_id' => $user->id,
            'amount' => $amount_total
        ]);
    }
}
