<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\Permissions\PermissionsSeeder;
use Database\Seeders\Common\MenuSeeder;
use Database\Seeders\Common\PaisSeeder;
use Database\Seeders\Common\CidadesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PaisSeeder::class);
        $this->call(CidadesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(MenuSeeder::class);

        $superAdmin = \App\Models\User::firstOrCreate(
            ['email' => 'admin@sistema.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('teste123'),
                'email_verified_at' => now()
            ]
        );
        $superAdmin->givePermissionTo('Super Admin');
    }
}
