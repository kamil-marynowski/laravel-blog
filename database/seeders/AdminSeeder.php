<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();

        $admin->create([
            'name' => 'Admin',
            'email' => 'kamil.marynovski@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
