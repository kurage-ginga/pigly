<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        WeightTarget::factory()->create([
            'user_id' => $user->id,
        ]);

        WeightLog::factory(35)->create([
            'user_id' => $user->id,
        ]);
    }
}