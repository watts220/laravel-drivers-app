<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Driver;
use App\Models\Route;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private const NUM_DRIVERS = 100;
    private const NUM_ROUTES = 100;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seedUsers();
        $this->seedDrivers();
        $this->seedRoutes();
    }

    private function seedUsers(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    private function seedDrivers(): void
    {
        Driver::factory(self::NUM_DRIVERS)->create();
    }

    private function seedRoutes(): void
    {
        Route::factory(self::NUM_ROUTES)->create();
    }
}
