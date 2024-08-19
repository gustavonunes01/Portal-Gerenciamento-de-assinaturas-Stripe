<?php

namespace Database\Seeders\Common;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Common\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                ['nome' => 'Dashboard', 'menu_id' => null],
                ['link' => '/', 'icone' => 'ri-dashboard-line', 'badge' => null, 'badge_texto' => null]
            ],
            [
                ['nome' => 'Cadastros', 'menu_id' => null],
                ['link' => '/', 'icone' => 'ri-eraser-fill', 'badge' => null, 'badge_texto' => null]
            ]
        ];

        foreach($menus as $menu) {
            Menu::FirstOrCreate($menu[0], $menu[1]);
        }
    }
}
