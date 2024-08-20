<?php

namespace Database\Seeders\Enderecamento;

use App\Models\Assinaturas\Unidades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Common\Menu;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name_default = 'ONOVOLAB';

        $menus = [
            [
                ['cidade' => 'são carlos'],
                ['nome' => "{$name_default} São Carlos", 'endereco_completo' => 'R. Aquidaban, 1 - Centro']
            ],[
                ['cidade' => 'indaiatuba'],
                ['nome' => "{$name_default} Indaiatuba", 'endereco_completo' => 'R. das Primaveras, 1050 - Loja 43 - Parque Pompeia']
            ],[
                ['cidade' => 'araraquara'],
                ['nome' => "{$name_default} Araraquara", 'endereco_completo' => 'R. Gonçalves Dias, 543 - Centro']
            ],
        ];

        foreach($menus as $menu) {
            Unidades::updateOrCreate($menu[0], $menu[1]);
        }
    }
}
