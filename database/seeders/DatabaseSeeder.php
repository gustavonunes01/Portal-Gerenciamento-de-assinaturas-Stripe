<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Enderecamento\UnidadeSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\Permissions\PermissionsSeeder;
use Database\Seeders\Common\MenuSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsSeeder::class);
        $this->call(UnidadeSeeder::class);
        $this->call(CadeiraSeeders::class);

        $superAdmin = \App\Models\User::firstOrCreate(
            ['email' => 'admin@sistema.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('Ac8ok84F\v1C'),
                'email_verified_at' => now()
            ]
        );

//        $superAdmin->givePermissionTo('Super Admin');
    }
}
