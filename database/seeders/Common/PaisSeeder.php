<?php

namespace Database\Seeders\Common;

use App\Models\Common\Pais;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Pais::count() > 0)
            return;
        $paises = [
            [
            'id' => 1,
            'data' => [ 
                        'nome'  => 'Brasil',
                        'sigla' => 'BR',
                        'ISO2'  => 'BR',
                        'ISO3'  => 'BRA',
                        'ISON'  => '76',
                    ]
            ],
            [
            'id' => 2,
            'data' => [ 
                        'nome'  => 'Paraguai',
                        'sigla' => 'PY',
                        'ISO2'  => 'PY',
                        'ISO3'  => 'PRY',
                        'ISON'  => '600',
                    ]
            ],
            [
            'id' => 3,
            'data' => [ 
                        'nome'  => 'Argentina',
                        'sigla' => 'AR',
                        'ISO2'  => 'AR',
                        'ISO3'  => 'ARG',
                        'ISON'  => '32',
                    ]
            ],
            [
            'id' => 4,
            'data' => [ 
                        'nome'  => 'Uruguai',
                        'sigla' => 'UY',
                        'ISO2'  => 'UY',
                        'ISO3'  => 'URY',
                        'ISON'  => '858',
                    ]
            ],
            [
            'id' => 5,
            'data' => [ 
                        'nome'  => 'Chile',
                        'sigla' => 'CL',
                        'ISO2'  => 'CL',
                        'ISO3'  => 'CHL',
                        'ISON'  => '152',
                    ]
            ],
            [
            'id' => 6,
            'data' => [ 
                        'nome'  => 'Bolívia',
                        'sigla' => 'BO',
                        'ISO2'  => 'BO',
                        'ISO3'  => 'BOL',
                        'ISON'  => '68',
                    ]
            ],
            [
            'id' => 7,
            'data' => [ 
                        'nome'  => 'Peru',
                        'sigla' => 'PE',
                        'ISO2'  => 'PE',
                        'ISO3'  => 'PER',
                        'ISON'  => '604',
                    ]
            ],
            [
            'id' => 8,
            'data' => [ 
                        'nome'  => 'Equador',
                        'sigla' => 'EC',
                        'ISO2'  => 'EC',
                        'ISO3'  => 'ECU',
                        'ISON'  => '218',
                    ]
            ],
            [
            'id' => 9,
            'data' => [ 
                        'nome'  => 'Venezuela',
                        'sigla' => 'VE',
                        'ISO2'  => 'VE',
                        'ISO3'  => 'VEN',
                        'ISON'  => '862',
                    ]
            ],
            [
            'id' => 10,
            'data' => [ 
                        'nome'  => 'Afeganistão',
                        'sigla' => 'AF',
                        'ISO2'  => 'AF',
                        'ISO3'  => 'AFG',
                        'ISON'  => '4',
                    ]
            ],
            [
            'id' => 11,
            'data' => [ 
                        'nome'  => 'África do Sul',
                        'sigla' => 'ZA',
                        'ISO2'  => 'ZA',
                        'ISO3'  => 'ZAF',
                        'ISON'  => '710',
                    ]
            ],
            [
            'id' => 12,
            'data' => [ 
                        'nome'  => 'Albânia',
                        'sigla' => 'AL',
                        'ISO2'  => 'AL',
                        'ISO3'  => 'ALB',
                        'ISON'  => '8',
                    ]
            ],
            [
            'id' => 13,
            'data' => [ 
                        'nome'  => 'Alemanha',
                        'sigla' => 'DE',
                        'ISO2'  => 'DE',
                        'ISO3'  => 'DEU',
                        'ISON'  => '276',
                    ]
            ],
            [
            'id' => 14,
            'data' => [ 
                        'nome'  => 'Andorra',
                        'sigla' => 'AD',
                        'ISO2'  => 'AD',
                        'ISO3'  => 'AND',
                        'ISON'  => '20',
                    ]
            ],
            [
            'id' => 15,
            'data' => [ 
                        'nome'  => 'Angola',
                        'sigla' => 'AO',
                        'ISO2'  => 'AO',
                        'ISO3'  => 'AGO',
                        'ISON'  => '24',
                    ]
            ],
            [
            'id' => 16,
            'data' => [ 
                        'nome'  => 'Anguila',
                        'sigla' => 'AI',
                        'ISO2'  => 'AI',
                        'ISO3'  => 'AIA',
                        'ISON'  => '660',
                    ]
            ],
            [
            'id' => 17,
            'data' => [ 
                        'nome'  => 'Antártica',
                        'sigla' => 'AQ',
                        'ISO2'  => 'AQ',
                        'ISO3'  => 'ATA',
                        'ISON'  => '10',
                    ]
            ],
            [
            'id' => 18,
            'data' => [ 
                        'nome'  => 'Antígua e Barbuda',
                        'sigla' => 'AG',
                        'ISO2'  => 'AG',
                        'ISO3'  => 'ATG',
                        'ISON'  => '28',
                    ]
            ],
            [
            'id' => 19,
            'data' => [ 
                        'nome'  => 'Arábia Saudita',
                        'sigla' => 'SA',
                        'ISO2'  => 'SA',
                        'ISO3'  => 'SAU',
                        'ISON'  => '682',
                    ]
            ],
            [
            'id' => 20,
            'data' => [ 
                        'nome'  => 'Argélia',
                        'sigla' => 'DZ',
                        'ISO2'  => 'DZ',
                        'ISO3'  => 'DZA',
                        'ISON'  => '12',
                    ]
            ],
            [
            'id' => 21,
            'data' => [ 
                        'nome'  => 'Armênia',
                        'sigla' => 'AM',
                        'ISO2'  => 'AM',
                        'ISO3'  => 'ARM',
                        'ISON'  => '51',
                    ]
            ],
            [
            'id' => 22,
            'data' => [ 
                        'nome'  => 'Aruba',
                        'sigla' => 'AW',
                        'ISO2'  => 'AW',
                        'ISO3'  => 'ABW',
                        'ISON'  => '533',
                    ]
            ],
            [
            'id' => 23,
            'data' => [ 
                        'nome'  => 'Austrália',
                        'sigla' => 'AU',
                        'ISO2'  => 'AU',
                        'ISO3'  => 'AUS',
                        'ISON'  => '36',
                    ]
            ],
            [
            'id' => 24,
            'data' => [ 
                        'nome'  => 'Áustria',
                        'sigla' => 'AT',
                        'ISO2'  => 'AT',
                        'ISO3'  => 'AUT',
                        'ISON'  => '40',
                    ]
            ],
            [
            'id' => 25,
            'data' => [ 
                        'nome'  => 'Azerbaijão',
                        'sigla' => 'AZ',
                        'ISO2'  => 'AZ',
                        'ISO3'  => 'AZE',
                        'ISON'  => '31',
                    ]
            ],
            [
            'id' => 26,
            'data' => [ 
                        'nome'  => 'Bahamas',
                        'sigla' => 'BS',
                        'ISO2'  => 'BS',
                        'ISO3'  => 'BHS',
                        'ISON'  => '44',
                    ]
            ],
            [
            'id' => 27,
            'data' => [ 
                        'nome'  => 'Bahrein',
                        'sigla' => 'BH',
                        'ISO2'  => 'BH',
                        'ISO3'  => 'BHR',
                        'ISON'  => '48',
                    ]
            ],
            [
            'id' => 28,
            'data' => [ 
                        'nome'  => 'Bangladesh',
                        'sigla' => 'BD',
                        'ISO2'  => 'BD',
                        'ISO3'  => 'BGD',
                        'ISON'  => '50',
                    ]
            ],
            [
            'id' => 29,
            'data' => [ 
                        'nome'  => 'Barbados',
                        'sigla' => 'BB',
                        'ISO2'  => 'BB',
                        'ISO3'  => 'BRB',
                        'ISON'  => '52',
                    ]
            ],
            [
            'id' => 30,
            'data' => [ 
                        'nome'  => 'Belarus',
                        'sigla' => 'BY',
                        'ISO2'  => 'BY',
                        'ISO3'  => 'BLR',
                        'ISON'  => '112',
                    ]
            ],
            [
            'id' => 31,
            'data' => [ 
                        'nome'  => 'Bélgica',
                        'sigla' => 'BE',
                        'ISO2'  => 'BE',
                        'ISO3'  => 'BEL',
                        'ISON'  => '56',
                    ]
            ],
            [
            'id' => 32,
            'data' => [ 
                        'nome'  => 'Belize',
                        'sigla' => 'BZ',
                        'ISO2'  => 'BZ',
                        'ISO3'  => 'BLZ',
                        'ISON'  => '84',
                    ]
            ],
            [
            'id' => 33,
            'data' => [ 
                        'nome'  => 'Benin',
                        'sigla' => 'BJ',
                        'ISO2'  => 'BJ',
                        'ISO3'  => 'BEN',
                        'ISON'  => '204',
                    ]
            ],
            [
            'id' => 34,
            'data' => [ 
                        'nome'  => 'Bermudas',
                        'sigla' => 'BM',
                        'ISO2'  => 'BM',
                        'ISO3'  => 'BMU',
                        'ISON'  => '60',
                    ]
            ],
            [
            'id' => 35,
            'data' => [ 
                        'nome'  => 'Bósnia e Herzegovina',
                        'sigla' => 'BA',
                        'ISO2'  => 'BA',
                        'ISO3'  => 'BIH',
                        'ISON'  => '70',
                    ]
            ],
            [
            'id' => 36,
            'data' => [ 
                        'nome'  => 'Botsuana',
                        'sigla' => 'BW',
                        'ISO2'  => 'BW',
                        'ISO3'  => 'BWA',
                        'ISON'  => '72',
                    ]
            ],
            [
            'id' => 37,
            'data' => [ 
                        'nome'  => 'Brunei',
                        'sigla' => 'BN',
                        'ISO2'  => 'BN',
                        'ISO3'  => 'BRN',
                        'ISON'  => '96',
                    ]
            ],
            [
            'id' => 38,
            'data' => [ 
                        'nome'  => 'Bulgária',
                        'sigla' => 'BG',
                        'ISO2'  => 'BG',
                        'ISO3'  => 'BGR',
                        'ISON'  => '100',
                    ]
            ],
            [
            'id' => 39,
            'data' => [ 
                        'nome'  => 'Burkina Faso',
                        'sigla' => 'BF',
                        'ISO2'  => 'BF',
                        'ISO3'  => 'BFA',
                        'ISON'  => '854',
                    ]
            ],
            [
            'id' => 40,
            'data' => [ 
                        'nome'  => 'Burundi',
                        'sigla' => 'BI',
                        'ISO2'  => 'BI',
                        'ISO3'  => 'BDI',
                        'ISON'  => '108',
                    ]
            ],
            [
            'id' => 41,
            'data' => [ 
                        'nome'  => 'Butão',
                        'sigla' => 'BT',
                        'ISO2'  => 'BT',
                        'ISO3'  => 'BTN',
                        'ISON'  => '64',
                    ]
            ],
            [
            'id' => 42,
            'data' => [ 
                        'nome'  => 'Cabo Verde',
                        'sigla' => 'CV',
                        'ISO2'  => 'CV',
                        'ISO3'  => 'CPV',
                        'ISON'  => '132',
                    ]
            ],
            [
            'id' => 43,
            'data' => [ 
                        'nome'  => 'Camarões',
                        'sigla' => 'CM',
                        'ISO2'  => 'CM',
                        'ISO3'  => 'CMR',
                        'ISON'  => '120',
                    ]
            ],
            [
            'id' => 44,
            'data' => [ 
                        'nome'  => 'Camboja',
                        'sigla' => 'KH',
                        'ISO2'  => 'KH',
                        'ISO3'  => 'KHM',
                        'ISON'  => '116',
                    ]
            ],
            [
            'id' => 45,
            'data' => [ 
                        'nome'  => 'Canadá',
                        'sigla' => 'CA',
                        'ISO2'  => 'CA',
                        'ISO3'  => 'CAN',
                        'ISON'  => '124',
                    ]
            ],
            [
            'id' => 46,
            'data' => [ 
                        'nome'  => 'Cazaquistão',
                        'sigla' => 'KZ',
                        'ISO2'  => 'KZ',
                        'ISO3'  => 'KAZ',
                        'ISON'  => '398',
                    ]
            ],
            [
            'id' => 47,
            'data' => [ 
                        'nome'  => 'Chade',
                        'sigla' => 'TD',
                        'ISO2'  => 'TD',
                        'ISO3'  => 'TCD',
                        'ISON'  => '148',
                    ]
            ],
            [
            'id' => 48,
            'data' => [ 
                        'nome'  => 'China',
                        'sigla' => 'CN',
                        'ISO2'  => 'CN',
                        'ISO3'  => 'CHN',
                        'ISON'  => '156',
                    ]
            ],
            [
            'id' => 49,
            'data' => [ 
                        'nome'  => 'Chipre',
                        'sigla' => 'CY',
                        'ISO2'  => 'CY',
                        'ISO3'  => 'CYP',
                        'ISON'  => '196',
                    ]
            ],
            [
            'id' => 50,
            'data' => [ 
                        'nome'  => 'Cidade do Vaticano',
                        'sigla' => 'VA',
                        'ISO2'  => 'VA',
                        'ISO3'  => 'VAT',
                        'ISON'  => '336',
                    ]
            ],
            [
            'id' => 51,
            'data' => [ 
                        'nome'  => 'Cingapura',
                        'sigla' => 'SG',
                        'ISO2'  => 'SG',
                        'ISO3'  => 'SGP',
                        'ISON'  => '702',
                    ]
            ],
            [
            'id' => 52,
            'data' => [ 
                        'nome'  => 'Colômbia',
                        'sigla' => 'CO',
                        'ISO2'  => 'CO',
                        'ISO3'  => 'COL',
                        'ISON'  => '170',
                    ]
            ],
            [
            'id' => 53,
            'data' => [ 
                        'nome'  => 'Comores',
                        'sigla' => 'KM',
                        'ISO2'  => 'KM',
                        'ISO3'  => 'COM',
                        'ISON'  => '174',
                    ]
            ],
            [
            'id' => 54,
            'data' => [ 
                        'nome'  => 'Coréia do Norte',
                        'sigla' => 'KP',
                        'ISO2'  => 'KP',
                        'ISO3'  => 'PRK',
                        'ISON'  => '408',
                    ]
            ],
            [
            'id' => 55,
            'data' => [ 
                        'nome'  => 'Coréia do Sul',
                        'sigla' => 'KR',
                        'ISO2'  => 'KR',
                        'ISO3'  => 'KOR',
                        'ISON'  => '410',
                    ]
            ],
            [
            'id' => 56,
            'data' => [ 
                        'nome'  => 'Costa do Marfim',
                        'sigla' => 'CI',
                        'ISO2'  => 'CI',
                        'ISO3'  => 'CIV',
                        'ISON'  => '384',
                    ]
            ],
            [
            'id' => 57,
            'data' => [ 
                        'nome'  => 'Costa Rica',
                        'sigla' => 'CR',
                        'ISO2'  => 'CR',
                        'ISO3'  => 'CRI',
                        'ISON'  => '188',
                    ]
            ],
            [
            'id' => 58,
            'data' => [ 
                        'nome'  => 'Croácia',
                        'sigla' => 'HR',
                        'ISO2'  => 'HR',
                        'ISO3'  => 'HRV',
                        'ISON'  => '191',
                    ]
            ],
            [
            'id' => 59,
            'data' => [ 
                        'nome'  => 'Cuba',
                        'sigla' => 'CU',
                        'ISO2'  => 'CU',
                        'ISO3'  => 'CUB',
                        'ISON'  => '192',
                    ]
            ],
            [
            'id' => 60,
            'data' => [ 
                        'nome'  => 'Curaçao',
                        'sigla' => 'CW',
                        'ISO2'  => 'CW',
                        'ISO3'  => 'CUW',
                        'ISON'  => '531',
                    ]
            ],
            [
            'id' => 61,
            'data' => [ 
                        'nome'  => 'Dinamarca',
                        'sigla' => 'DK',
                        'ISO2'  => 'DK',
                        'ISO3'  => 'DNK',
                        'ISON'  => '208',
                    ]
            ],
            [
            'id' => 62,
            'data' => [ 
                        'nome'  => 'Djibouti',
                        'sigla' => 'DJ',
                        'ISO2'  => 'DJ',
                        'ISO3'  => 'DJI',
                        'ISON'  => '262',
                    ]
            ],
            [
            'id' => 63,
            'data' => [ 
                        'nome'  => 'Dominica',
                        'sigla' => 'DM',
                        'ISO2'  => 'DM',
                        'ISO3'  => 'DMA',
                        'ISON'  => '212',
                    ]
            ],
            [
            'id' => 64,
            'data' => [ 
                        'nome'  => 'Egito',
                        'sigla' => 'EG',
                        'ISO2'  => 'EG',
                        'ISO3'  => 'EGY',
                        'ISON'  => '818',
                    ]
            ],
            [
            'id' => 65,
            'data' => [ 
                        'nome'  => 'El Salvador',
                        'sigla' => 'SV',
                        'ISO2'  => 'SV',
                        'ISO3'  => 'SLV',
                        'ISON'  => '222',
                    ]
            ],
            [
            'id' => 66,
            'data' => [ 
                        'nome'  => 'Emirados Árabes Unidos',
                        'sigla' => 'AE',
                        'ISO2'  => 'AE',
                        'ISO3'  => 'ARE',
                        'ISON'  => '784',
                    ]
            ],
            [
            'id' => 67,
            'data' => [ 
                        'nome'  => 'Eritreia',
                        'sigla' => 'ER',
                        'ISO2'  => 'ER',
                        'ISO3'  => 'ERI',
                        'ISON'  => '232',
                    ]
            ],
            [
            'id' => 68,
            'data' => [ 
                        'nome'  => 'Eslováquia',
                        'sigla' => 'SK',
                        'ISO2'  => 'SK',
                        'ISO3'  => 'SVK',
                        'ISON'  => '703',
                    ]
            ],
            [
            'id' => 69,
            'data' => [ 
                        'nome'  => 'Eslovênia',
                        'sigla' => 'SI',
                        'ISO2'  => 'SI',
                        'ISO3'  => 'SVN',
                        'ISON'  => '705',
                    ]
            ],
            [
            'id' => 70,
            'data' => [ 
                        'nome'  => 'Espanha',
                        'sigla' => 'ES',
                        'ISO2'  => 'ES',
                        'ISO3'  => 'ESP',
                        'ISON'  => '724',
                    ]
            ],
            [
            'id' => 71,
            'data' => [ 
                        'nome'  => 'Estados Federados da Micronésia',
                        'sigla' => 'FM',
                        'ISO2'  => 'FM',
                        'ISO3'  => 'FSM',
                        'ISON'  => '583',
                    ]
            ],
            [
            'id' => 72,
            'data' => [ 
                        'nome'  => 'Estados Unidos da América',
                        'sigla' => 'US',
                        'ISO2'  => 'US',
                        'ISO3'  => 'USA',
                        'ISON'  => '840',
                    ]
            ],
            [
            'id' => 73,
            'data' => [ 
                        'nome'  => 'Estônia',
                        'sigla' => 'EE',
                        'ISO2'  => 'EE',
                        'ISO3'  => 'EST',
                        'ISON'  => '233',
                    ]
            ],
            [
            'id' => 74,
            'data' => [ 
                        'nome'  => 'Eswatini',
                        'sigla' => 'SZ',
                        'ISO2'  => 'SZ',
                        'ISO3'  => 'SWZ',
                        'ISON'  => '748',
                    ]
            ],
            [
            'id' => 75,
            'data' => [ 
                        'nome'  => 'Etiópia',
                        'sigla' => 'ET',
                        'ISO2'  => 'ET',
                        'ISO3'  => 'ETH',
                        'ISON'  => '231',
                    ]
            ],
            [
            'id' => 76,
            'data' => [ 
                        'nome'  => 'Fiji',
                        'sigla' => 'FJ',
                        'ISO2'  => 'FJ',
                        'ISO3'  => 'FJI',
                        'ISON'  => '242',
                    ]
            ],
            [
            'id' => 77,
            'data' => [ 
                        'nome'  => 'Filipinas',
                        'sigla' => 'PH',
                        'ISO2'  => 'PH',
                        'ISO3'  => 'PHL',
                        'ISON'  => '608',
                    ]
            ],
            [
            'id' => 78,
            'data' => [ 
                        'nome'  => 'Finlândia',
                        'sigla' => 'FI',
                        'ISO2'  => 'FI',
                        'ISO3'  => 'FIN',
                        'ISON'  => '246',
                    ]
            ],
            [
            'id' => 79,
            'data' => [ 
                        'nome'  => 'França',
                        'sigla' => 'FR',
                        'ISO2'  => 'FR',
                        'ISO3'  => 'FRA',
                        'ISON'  => '250',
                    ]
            ],
            [
            'id' => 80,
            'data' => [ 
                        'nome'  => 'Gabão',
                        'sigla' => 'GA',
                        'ISO2'  => 'GA',
                        'ISO3'  => 'GAB',
                        'ISON'  => '266',
                    ]
            ],
            [
            'id' => 81,
            'data' => [ 
                        'nome'  => 'Gâmbia',
                        'sigla' => 'GM',
                        'ISO2'  => 'GM',
                        'ISO3'  => 'GMB',
                        'ISON'  => '270',
                    ]
            ],
            [
            'id' => 82,
            'data' => [ 
                        'nome'  => 'Gana',
                        'sigla' => 'GH',
                        'ISO2'  => 'GH',
                        'ISO3'  => 'GHA',
                        'ISON'  => '288',
                    ]
            ],
            [
            'id' => 83,
            'data' => [ 
                        'nome'  => 'Geórgia',
                        'sigla' => 'GE',
                        'ISO2'  => 'GE',
                        'ISO3'  => 'GEO',
                        'ISON'  => '268',
                    ]
            ],
            [
            'id' => 84,
            'data' => [ 
                        'nome'  => 'Geórgia do Sul e as Ilhas Sandwich do Sul',
                        'sigla' => 'GS',
                        'ISO2'  => 'GS',
                        'ISO3'  => 'SGS',
                        'ISON'  => '239',
                    ]
            ],
            [
            'id' => 85,
            'data' => [ 
                        'nome'  => 'Gibraltar',
                        'sigla' => 'GI',
                        'ISO2'  => 'GI',
                        'ISO3'  => 'GIB',
                        'ISON'  => '292',
                    ]
            ],
            [
            'id' => 86,
            'data' => [ 
                        'nome'  => 'Grécia',
                        'sigla' => 'GR',
                        'ISO2'  => 'GR',
                        'ISO3'  => 'GRC',
                        'ISON'  => '300',
                    ]
            ],
            [
            'id' => 87,
            'data' => [ 
                        'nome'  => 'Grenada',
                        'sigla' => 'GD',
                        'ISO2'  => 'GD',
                        'ISO3'  => 'GRD',
                        'ISON'  => '308',
                    ]
            ],
            [
            'id' => 88,
            'data' => [ 
                        'nome'  => 'Gronelândia',
                        'sigla' => 'GL',
                        'ISO2'  => 'GL',
                        'ISO3'  => 'GRL',
                        'ISON'  => '304',
                    ]
            ],
            [
            'id' => 89,
            'data' => [ 
                        'nome'  => 'Guadalupe',
                        'sigla' => 'GP',
                        'ISO2'  => 'GP',
                        'ISO3'  => 'GLP',
                        'ISON'  => '312',
                    ]
            ],
            [
            'id' => 90,
            'data' => [ 
                        'nome'  => 'Guam',
                        'sigla' => 'GU',
                        'ISO2'  => 'GU',
                        'ISO3'  => 'GUM',
                        'ISON'  => '316',
                    ]
            ],
            [
            'id' => 91,
            'data' => [ 
                        'nome'  => 'Guatemala',
                        'sigla' => 'GT',
                        'ISO2'  => 'GT',
                        'ISO3'  => 'GTM',
                        'ISON'  => '320',
                    ]
            ],
            [
            'id' => 92,
            'data' => [ 
                        'nome'  => 'Guernsey',
                        'sigla' => 'GG',
                        'ISO2'  => 'GG',
                        'ISO3'  => 'GGY',
                        'ISON'  => '831',
                    ]
            ],
            [
            'id' => 93,
            'data' => [ 
                        'nome'  => 'Guiana',
                        'sigla' => 'GY',
                        'ISO2'  => 'GY',
                        'ISO3'  => 'GUY',
                        'ISON'  => '328',
                    ]
            ],
            [
            'id' => 94,
            'data' => [ 
                        'nome'  => 'Guiana Francesa',
                        'sigla' => 'GF',
                        'ISO2'  => 'GF',
                        'ISO3'  => 'GUF',
                        'ISON'  => '254',
                    ]
            ],
            [
            'id' => 95,
            'data' => [ 
                        'nome'  => 'Guiné',
                        'sigla' => 'GN',
                        'ISO2'  => 'GN',
                        'ISO3'  => 'GIN',
                        'ISON'  => '324',
                    ]
            ],
            [
            'id' => 96,
            'data' => [ 
                        'nome'  => 'Guiné Equatorial',
                        'sigla' => 'GQ',
                        'ISO2'  => 'GQ',
                        'ISO3'  => 'GNQ',
                        'ISON'  => '226',
                    ]
            ],
            [
            'id' => 97,
            'data' => [ 
                        'nome'  => 'Guiné-Bissau',
                        'sigla' => 'GW',
                        'ISO2'  => 'GW',
                        'ISO3'  => 'GNB',
                        'ISON'  => '624',
                    ]
            ],
            [
            'id' => 98,
            'data' => [ 
                        'nome'  => 'Haiti',
                        'sigla' => 'HT',
                        'ISO2'  => 'HT',
                        'ISO3'  => 'HTI',
                        'ISON'  => '332',
                    ]
            ],
            [
            'id' => 99,
            'data' => [ 
                        'nome'  => 'Honduras',
                        'sigla' => 'HN',
                        'ISO2'  => 'HN',
                        'ISO3'  => 'HND',
                        'ISON'  => '340',
                    ]
            ],
            [
            'id' => 100,
            'data' => [ 
                        'nome'  => 'Hong Kong',
                        'sigla' => 'HK',
                        'ISO2'  => 'HK',
                        'ISO3'  => 'HKG',
                        'ISON'  => '344',
                    ]
            ],
            [
            'id' => 101,
            'data' => [ 
                        'nome'  => 'Hungria',
                        'sigla' => 'HU',
                        'ISO2'  => 'HU',
                        'ISO3'  => 'HUN',
                        'ISON'  => '348',
                    ]
            ],
            [
            'id' => 102,
            'data' => [ 
                        'nome'  => 'Iêmen',
                        'sigla' => 'YE',
                        'ISO2'  => 'YE',
                        'ISO3'  => 'YEM',
                        'ISON'  => '887',
                    ]
            ],
            [
            'id' => 103,
            'data' => [ 
                        'nome'  => 'Ilha Bouvet',
                        'sigla' => 'BV',
                        'ISO2'  => 'BV',
                        'ISO3'  => 'BVT',
                        'ISON'  => '74',
                    ]
            ],
            [
            'id' => 104,
            'data' => [ 
                        'nome'  => 'Ilha da Reunião',
                        'sigla' => 'RE',
                        'ISO2'  => 'RE',
                        'ISO3'  => 'REU',
                        'ISON'  => '638',
                    ]
            ],
            [
            'id' => 105,
            'data' => [ 
                        'nome'  => 'Ilha de Man',
                        'sigla' => 'IM',
                        'ISO2'  => 'IM',
                        'ISO3'  => 'IMN',
                        'ISON'  => '833',
                    ]
            ],
            [
            'id' => 106,
            'data' => [ 
                        'nome'  => 'Ilha de Natal',
                        'sigla' => 'CX',
                        'ISO2'  => 'CX',
                        'ISO3'  => 'CXR',
                        'ISON'  => '162',
                    ]
            ],
            [
            'id' => 107,
            'data' => [ 
                        'nome'  => 'Ilha Norfolk',
                        'sigla' => 'NF',
                        'ISO2'  => 'NF',
                        'ISO3'  => 'NFK',
                        'ISON'  => '574',
                    ]
            ],
            [
            'id' => 108,
            'data' => [ 
                        'nome'  => 'Ilhas Åland',
                        'sigla' => 'AX',
                        'ISO2'  => 'AX',
                        'ISO3'  => 'ALA',
                        'ISON'  => '248',
                    ]
            ],
            [
            'id' => 109,
            'data' => [ 
                        'nome'  => 'Ilhas Cayman',
                        'sigla' => 'KY',
                        'ISO2'  => 'KY',
                        'ISO3'  => 'CYM',
                        'ISON'  => '136',
                    ]
            ],
            [
            'id' => 110,
            'data' => [ 
                        'nome'  => 'Ilhas Cocos',
                        'sigla' => 'CC',
                        'ISO2'  => 'CC',
                        'ISO3'  => 'CCK',
                        'ISON'  => '166',
                    ]
            ],
            [
            'id' => 111,
            'data' => [ 
                        'nome'  => 'Ilhas Cook',
                        'sigla' => 'CK',
                        'ISO2'  => 'CK',
                        'ISO3'  => 'COK',
                        'ISON'  => '184',
                    ]
            ],
            [
            'id' => 112,
            'data' => [ 
                        'nome'  => 'Ilhas Faroe',
                        'sigla' => 'FO',
                        'ISO2'  => 'FO',
                        'ISO3'  => 'FRO',
                        'ISON'  => '234',
                    ]
            ],
            [
            'id' => 113,
            'data' => [ 
                        'nome'  => 'Ilhas Malvinas',
                        'sigla' => 'FK',
                        'ISO2'  => 'FK',
                        'ISO3'  => 'FLK',
                        'ISON'  => '238',
                    ]
            ],
            [
            'id' => 114,
            'data' => [ 
                        'nome'  => 'Ilhas Marianas do Norte',
                        'sigla' => 'MP',
                        'ISO2'  => 'MP',
                        'ISO3'  => 'MNP',
                        'ISON'  => '580',
                    ]
            ],
            [
            'id' => 115,
            'data' => [ 
                        'nome'  => 'Ilhas Marshall',
                        'sigla' => 'MH',
                        'ISO2'  => 'MH',
                        'ISO3'  => 'MHL',
                        'ISON'  => '584',
                    ]
            ],
            [
            'id' => 116,
            'data' => [ 
                        'nome'  => 'Ilhas Menores Distantes dos Estados Unidos',
                        'sigla' => 'UM',
                        'ISO2'  => 'UM',
                        'ISO3'  => 'UMI',
                        'ISON'  => '581',
                    ]
            ],
            [
            'id' => 117,
            'data' => [ 
                        'nome'  => 'Ilhas Pitcairn',
                        'sigla' => 'PN',
                        'ISO2'  => 'PN',
                        'ISO3'  => 'PCN',
                        'ISON'  => '612',
                    ]
            ],
            [
            'id' => 118,
            'data' => [ 
                        'nome'  => 'Ilhas Salomão',
                        'sigla' => 'SB',
                        'ISO2'  => 'SB',
                        'ISO3'  => 'SLB',
                        'ISON'  => '90',
                    ]
            ],
            [
            'id' => 119,
            'data' => [ 
                        'nome'  => 'Ilhas Turcas e Caicos',
                        'sigla' => 'TC',
                        'ISO2'  => 'TC',
                        'ISO3'  => 'TCA',
                        'ISON'  => '796',
                    ]
            ],
            [
            'id' => 120,
            'data' => [ 
                        'nome'  => 'Ilhas Virgens (Reino Unido)',
                        'sigla' => 'VG',
                        'ISO2'  => 'VG',
                        'ISO3'  => 'VGB',
                        'ISON'  => '92',
                    ]
            ],
            [
            'id' => 121,
            'data' => [ 
                        'nome'  => 'Ilhas Virgens dos Estados Unidos',
                        'sigla' => 'VI',
                        'ISO2'  => 'VI',
                        'ISO3'  => 'VIR',
                        'ISON'  => '850',
                    ]
            ],
            [
            'id' => 122,
            'data' => [ 
                        'nome'  => 'Índia',
                        'sigla' => 'IN',
                        'ISO2'  => 'IN',
                        'ISO3'  => 'IND',
                        'ISON'  => '356',
                    ]
            ],
            [
            'id' => 123,
            'data' => [ 
                        'nome'  => 'Indonésia',
                        'sigla' => 'ID',
                        'ISO2'  => 'ID',
                        'ISO3'  => 'IDN',
                        'ISON'  => '360',
                    ]
            ],
            [
            'id' => 124,
            'data' => [ 
                        'nome'  => 'Irã',
                        'sigla' => 'IR',
                        'ISO2'  => 'IR',
                        'ISO3'  => 'IRN',
                        'ISON'  => '364',
                    ]
            ],
            [
            'id' => 125,
            'data' => [ 
                        'nome'  => 'Iraque',
                        'sigla' => 'IQ',
                        'ISO2'  => 'IQ',
                        'ISO3'  => 'IRQ',
                        'ISON'  => '368',
                    ]
            ],
            [
            'id' => 126,
            'data' => [ 
                        'nome'  => 'Irlanda',
                        'sigla' => 'IE',
                        'ISO2'  => 'IE',
                        'ISO3'  => 'IRL',
                        'ISON'  => '372',
                    ]
            ],
            [
            'id' => 127,
            'data' => [ 
                        'nome'  => 'Islândia',
                        'sigla' => 'IS',
                        'ISO2'  => 'IS',
                        'ISO3'  => 'ISL',
                        'ISON'  => '352',
                    ]
            ],
            [
            'id' => 128,
            'data' => [ 
                        'nome'  => 'Israel',
                        'sigla' => 'IL',
                        'ISO2'  => 'IL',
                        'ISO3'  => 'ISR',
                        'ISON'  => '376',
                    ]
            ],
            [
            'id' => 129,
            'data' => [ 
                        'nome'  => 'Itália',
                        'sigla' => 'IT',
                        'ISO2'  => 'IT',
                        'ISO3'  => 'ITA',
                        'ISON'  => '380',
                    ]
            ],
            [
            'id' => 130,
            'data' => [ 
                        'nome'  => 'Jamaica',
                        'sigla' => 'JM',
                        'ISO2'  => 'JM',
                        'ISO3'  => 'JAM',
                        'ISON'  => '388',
                    ]
            ],
            [
            'id' => 131,
            'data' => [ 
                        'nome'  => 'Japão',
                        'sigla' => 'JP',
                        'ISO2'  => 'JP',
                        'ISO3'  => 'JPN',
                        'ISON'  => '392',
                    ]
            ],
            [
            'id' => 132,
            'data' => [ 
                        'nome'  => 'Jersey',
                        'sigla' => 'JE',
                        'ISO2'  => 'JE',
                        'ISO3'  => 'JEY',
                        'ISON'  => '832',
                    ]
            ],
            [
            'id' => 133,
            'data' => [ 
                        'nome'  => 'Jordânia',
                        'sigla' => 'JO',
                        'ISO2'  => 'JO',
                        'ISO3'  => 'JOR',
                        'ISON'  => '400',
                    ]
            ],
            [
            'id' => 134,
            'data' => [ 
                        'nome'  => 'Kiribati',
                        'sigla' => 'KI',
                        'ISO2'  => 'KI',
                        'ISO3'  => 'KIR',
                        'ISON'  => '296',
                    ]
            ],
            [
            'id' => 135,
            'data' => [ 
                        'nome'  => 'Kosovo',
                        'sigla' => 'XK',
                        'ISO2'  => 'XK',
                        'ISO3'  => 'XXK',
                        'ISON'  => '412',
                    ]
            ],
            [
            'id' => 136,
            'data' => [ 
                        'nome'  => 'Kuwait',
                        'sigla' => 'KW',
                        'ISO2'  => 'KW',
                        'ISO3'  => 'KWT',
                        'ISON'  => '414',
                    ]
            ],
            [
            'id' => 137,
            'data' => [ 
                        'nome'  => 'Laos',
                        'sigla' => 'LA',
                        'ISO2'  => 'LA',
                        'ISO3'  => 'LAO',
                        'ISON'  => '418',
                    ]
            ],
            [
            'id' => 138,
            'data' => [ 
                        'nome'  => 'Lesotho',
                        'sigla' => 'LS',
                        'ISO2'  => 'LS',
                        'ISO3'  => 'LSO',
                        'ISON'  => '426',
                    ]
            ],
            [
            'id' => 139,
            'data' => [ 
                        'nome'  => 'Letônia',
                        'sigla' => 'LV',
                        'ISO2'  => 'LV',
                        'ISO3'  => 'LVA',
                        'ISON'  => '428',
                    ]
            ],
            [
            'id' => 140,
            'data' => [ 
                        'nome'  => 'Líbano',
                        'sigla' => 'LB',
                        'ISO2'  => 'LB',
                        'ISO3'  => 'LBN',
                        'ISON'  => '422',
                    ]
            ],
            [
            'id' => 141,
            'data' => [ 
                        'nome'  => 'Libéria',
                        'sigla' => 'LR',
                        'ISO2'  => 'LR',
                        'ISO3'  => 'LBR',
                        'ISON'  => '430',
                    ]
            ],
            [
            'id' => 142,
            'data' => [ 
                        'nome'  => 'Líbia',
                        'sigla' => 'LY',
                        'ISO2'  => 'LY',
                        'ISO3'  => 'LBY',
                        'ISON'  => '434',
                    ]
            ],
            [
            'id' => 143,
            'data' => [ 
                        'nome'  => 'Liechtenstein',
                        'sigla' => 'LI',
                        'ISO2'  => 'LI',
                        'ISO3'  => 'LIE',
                        'ISON'  => '438',
                    ]
            ],
            [
            'id' => 144,
            'data' => [ 
                        'nome'  => 'Lituânia',
                        'sigla' => 'LT',
                        'ISO2'  => 'LT',
                        'ISO3'  => 'LTU',
                        'ISON'  => '440',
                    ]
            ],
            [
            'id' => 145,
            'data' => [ 
                        'nome'  => 'Luxemburgo',
                        'sigla' => 'LU',
                        'ISO2'  => 'LU',
                        'ISO3'  => 'LUX',
                        'ISON'  => '442',
                    ]
            ],
            [
            'id' => 146,
            'data' => [ 
                        'nome'  => 'Macau',
                        'sigla' => 'MO',
                        'ISO2'  => 'MO',
                        'ISO3'  => 'MAC',
                        'ISON'  => '446',
                    ]
            ],
            [
            'id' => 147,
            'data' => [ 
                        'nome'  => 'Madagascar',
                        'sigla' => 'MG',
                        'ISO2'  => 'MG',
                        'ISO3'  => 'MDG',
                        'ISON'  => '450',
                    ]
            ],
            [
            'id' => 148,
            'data' => [ 
                        'nome'  => 'Malásia',
                        'sigla' => 'MY',
                        'ISO2'  => 'MY',
                        'ISO3'  => 'MYS',
                        'ISON'  => '458',
                    ]
            ],
            [
            'id' => 149,
            'data' => [ 
                        'nome'  => 'Malauí',
                        'sigla' => 'MW',
                        'ISO2'  => 'MW',
                        'ISO3'  => 'MWI',
                        'ISON'  => '454',
                    ]
            ],
            [
            'id' => 150,
            'data' => [ 
                        'nome'  => 'Maldivas',
                        'sigla' => 'MV',
                        'ISO2'  => 'MV',
                        'ISO3'  => 'MDV',
                        'ISON'  => '462',
                    ]
            ],
            [
            'id' => 151,
            'data' => [ 
                        'nome'  => 'Mali',
                        'sigla' => 'ML',
                        'ISO2'  => 'ML',
                        'ISO3'  => 'MLI',
                        'ISON'  => '466',
                    ]
            ],
            [
            'id' => 152,
            'data' => [ 
                        'nome'  => 'Malta',
                        'sigla' => 'MT',
                        'ISO2'  => 'MT',
                        'ISO3'  => 'MLT',
                        'ISON'  => '470',
                    ]
            ],
            [
            'id' => 153,
            'data' => [ 
                        'nome'  => 'Marrocos',
                        'sigla' => 'MA',
                        'ISO2'  => 'MA',
                        'ISO3'  => 'MAR',
                        'ISON'  => '504',
                    ]
            ],
            [
            'id' => 154,
            'data' => [ 
                        'nome'  => 'Martinica',
                        'sigla' => 'MQ',
                        'ISO2'  => 'MQ',
                        'ISO3'  => 'MTQ',
                        'ISON'  => '474',
                    ]
            ],
            [
            'id' => 155,
            'data' => [ 
                        'nome'  => 'Maurício',
                        'sigla' => 'MU',
                        'ISO2'  => 'MU',
                        'ISO3'  => 'MUS',
                        'ISON'  => '480',
                    ]
            ],
            [
            'id' => 156,
            'data' => [ 
                        'nome'  => 'Mauritânia',
                        'sigla' => 'MR',
                        'ISO2'  => 'MR',
                        'ISO3'  => 'MRT',
                        'ISON'  => '478',
                    ]
            ],
            [
            'id' => 157,
            'data' => [ 
                        'nome'  => 'Mayotte',
                        'sigla' => 'YT',
                        'ISO2'  => 'YT',
                        'ISO3'  => 'MYT',
                        'ISON'  => '175',
                    ]
            ],
            [
            'id' => 158,
            'data' => [ 
                        'nome'  => 'México',
                        'sigla' => 'MX',
                        'ISO2'  => 'MX',
                        'ISO3'  => 'MEX',
                        'ISON'  => '484',
                    ]
            ],
            [
            'id' => 159,
            'data' => [ 
                        'nome'  => 'Mianmar',
                        'sigla' => 'MM',
                        'ISO2'  => 'MM',
                        'ISO3'  => 'MMR',
                        'ISON'  => '104',
                    ]
            ],
            [
            'id' => 160,
            'data' => [ 
                        'nome'  => 'Moçambique',
                        'sigla' => 'MZ',
                        'ISO2'  => 'MZ',
                        'ISO3'  => 'MOZ',
                        'ISON'  => '508',
                    ]
            ],
            [
            'id' => 161,
            'data' => [ 
                        'nome'  => 'Moldávia',
                        'sigla' => 'MD',
                        'ISO2'  => 'MD',
                        'ISO3'  => 'MDA',
                        'ISON'  => '498',
                    ]
            ],
            [
            'id' => 162,
            'data' => [ 
                        'nome'  => 'Mongólia',
                        'sigla' => 'MN',
                        'ISO2'  => 'MN',
                        'ISO3'  => 'MNG',
                        'ISON'  => '496',
                    ]
            ],
            [
            'id' => 163,
            'data' => [ 
                        'nome'  => 'Montenegro',
                        'sigla' => 'ME',
                        'ISO2'  => 'ME',
                        'ISO3'  => 'MNE',
                        'ISON'  => '499',
                    ]
            ],
            [
            'id' => 164,
            'data' => [ 
                        'nome'  => 'Montserrat',
                        'sigla' => 'MS',
                        'ISO2'  => 'MS',
                        'ISO3'  => 'MSR',
                        'ISON'  => '500',
                    ]
            ],
            [
            'id' => 165,
            'data' => [ 
                        'nome'  => 'Namíbia',
                        'sigla' => 'NA',
                        'ISO2'  => 'NA',
                        'ISO3'  => 'NAM',
                        'ISON'  => '516',
                    ]
            ],
            [
            'id' => 166,
            'data' => [ 
                        'nome'  => 'Nauru',
                        'sigla' => 'NR',
                        'ISO2'  => 'NR',
                        'ISO3'  => 'NRU',
                        'ISON'  => '520',
                    ]
            ],
            [
            'id' => 167,
            'data' => [ 
                        'nome'  => 'Nepal',
                        'sigla' => 'NP',
                        'ISO2'  => 'NP',
                        'ISO3'  => 'NPL',
                        'ISON'  => '524',
                    ]
            ],
            [
            'id' => 168,
            'data' => [ 
                        'nome'  => 'Nicarágua',
                        'sigla' => 'NI',
                        'ISO2'  => 'NI',
                        'ISO3'  => 'NIC',
                        'ISON'  => '558',
                    ]
            ],
            [
            'id' => 169,
            'data' => [ 
                        'nome'  => 'Níger',
                        'sigla' => 'NE',
                        'ISO2'  => 'NE',
                        'ISO3'  => 'NER',
                        'ISON'  => '562',
                    ]
            ],
            [
            'id' => 170,
            'data' => [ 
                        'nome'  => 'Nigéria',
                        'sigla' => 'NG',
                        'ISO2'  => 'NG',
                        'ISO3'  => 'NGA',
                        'ISON'  => '566',
                    ]
            ],
            [
            'id' => 171,
            'data' => [ 
                        'nome'  => 'Niue',
                        'sigla' => 'NU',
                        'ISO2'  => 'NU',
                        'ISO3'  => 'NIU',
                        'ISON'  => '570',
                    ]
            ],
            [
            'id' => 172,
            'data' => [ 
                        'nome'  => 'Norte da Macedônia',
                        'sigla' => 'MK',
                        'ISO2'  => 'MK',
                        'ISO3'  => 'MKD',
                        'ISON'  => '807',
                    ]
            ],
            [
            'id' => 173,
            'data' => [ 
                        'nome'  => 'Noruega',
                        'sigla' => 'NO',
                        'ISO2'  => 'NO',
                        'ISO3'  => 'NOR',
                        'ISON'  => '578',
                    ]
            ],
            [
            'id' => 174,
            'data' => [ 
                        'nome'  => 'Nova Caledônia',
                        'sigla' => 'NC',
                        'ISO2'  => 'NC',
                        'ISO3'  => 'NCL',
                        'ISON'  => '540',
                    ]
            ],
            [
            'id' => 175,
            'data' => [ 
                        'nome'  => 'Nova Zelândia',
                        'sigla' => 'NZ',
                        'ISO2'  => 'NZ',
                        'ISO3'  => 'NZL',
                        'ISON'  => '554',
                    ]
            ],
            [
            'id' => 176,
            'data' => [ 
                        'nome'  => 'Omã',
                        'sigla' => 'OM',
                        'ISO2'  => 'OM',
                        'ISO3'  => 'OMN',
                        'ISON'  => '512',
                    ]
            ],
            [
            'id' => 177,
            'data' => [ 
                        'nome'  => 'Ouvido e Ilhas McDonald',
                        'sigla' => 'HM',
                        'ISO2'  => 'HM',
                        'ISO3'  => 'HMD',
                        'ISON'  => '334',
                    ]
            ],
            [
            'id' => 178,
            'data' => [ 
                        'nome'  => 'Países Baixos',
                        'sigla' => 'NL',
                        'ISO2'  => 'NL',
                        'ISO3'  => 'NLD',
                        'ISON'  => '528',
                    ]
            ],
            [
            'id' => 179,
            'data' => [ 
                        'nome'  => 'Países Baixos Caribenhos',
                        'sigla' => 'BQ',
                        'ISO2'  => 'BQ',
                        'ISO3'  => 'BES',
                        'ISON'  => '535',
                    ]
            ],
            [
            'id' => 180,
            'data' => [ 
                        'nome'  => 'Palau',
                        'sigla' => 'PW',
                        'ISO2'  => 'PW',
                        'ISO3'  => 'PLW',
                        'ISON'  => '585',
                    ]
            ],
            [
            'id' => 181,
            'data' => [ 
                        'nome'  => 'Palestina',
                        'sigla' => 'PS',
                        'ISO2'  => 'PS',
                        'ISO3'  => 'PSE',
                        'ISON'  => '275',
                    ]
            ],
            [
            'id' => 182,
            'data' => [ 
                        'nome'  => 'Panamá',
                        'sigla' => 'PA',
                        'ISO2'  => 'PA',
                        'ISO3'  => 'PAN',
                        'ISON'  => '591',
                    ]
            ],
            [
            'id' => 183,
            'data' => [ 
                        'nome'  => 'Papua Nova Guiné',
                        'sigla' => 'PG',
                        'ISO2'  => 'PG',
                        'ISO3'  => 'PNG',
                        'ISON'  => '598',
                    ]
            ],
            [
            'id' => 184,
            'data' => [ 
                        'nome'  => 'Paquistão',
                        'sigla' => 'PK',
                        'ISO2'  => 'PK',
                        'ISO3'  => 'PAK',
                        'ISON'  => '586',
                    ]
            ],
            [
            'id' => 185,
            'data' => [ 
                        'nome'  => 'Polinésia Francesa',
                        'sigla' => 'PF',
                        'ISO2'  => 'PF',
                        'ISO3'  => 'PYF',
                        'ISON'  => '258',
                    ]
            ],
            [
            'id' => 186,
            'data' => [ 
                        'nome'  => 'Polônia',
                        'sigla' => 'PL',
                        'ISO2'  => 'PL',
                        'ISO3'  => 'POL',
                        'ISON'  => '616',
                    ]
            ],
            [
            'id' => 187,
            'data' => [ 
                        'nome'  => 'Porto Rico',
                        'sigla' => 'PR',
                        'ISO2'  => 'PR',
                        'ISO3'  => 'PRI',
                        'ISON'  => '630',
                    ]
            ],
            [
            'id' => 188,
            'data' => [ 
                        'nome'  => 'Portugal',
                        'sigla' => 'PT',
                        'ISO2'  => 'PT',
                        'ISO3'  => 'PRT',
                        'ISON'  => '620',
                    ]
            ],
            [
            'id' => 189,
            'data' => [ 
                        'nome'  => 'Principado de Mônaco',
                        'sigla' => 'MC',
                        'ISO2'  => 'MC',
                        'ISO3'  => 'MCO',
                        'ISON'  => '492',
                    ]
            ],
            [
            'id' => 190,
            'data' => [ 
                        'nome'  => 'Qatar',
                        'sigla' => 'QA',
                        'ISO2'  => 'QA',
                        'ISO3'  => 'QAT',
                        'ISON'  => '634',
                    ]
            ],
            [
            'id' => 191,
            'data' => [ 
                        'nome'  => 'Quênia',
                        'sigla' => 'KE',
                        'ISO2'  => 'KE',
                        'ISO3'  => 'KEN',
                        'ISON'  => '404',
                    ]
            ],
            [
            'id' => 192,
            'data' => [ 
                        'nome'  => 'Quirguizistão',
                        'sigla' => 'KG',
                        'ISO2'  => 'KG',
                        'ISO3'  => 'KGZ',
                        'ISON'  => '417',
                    ]
            ],
            [
            'id' => 193,
            'data' => [ 
                        'nome'  => 'Reino Unido',
                        'sigla' => 'GB',
                        'ISO2'  => 'GB',
                        'ISO3'  => 'GBR',
                        'ISON'  => '826',
                    ]
            ],
            [
            'id' => 194,
            'data' => [ 
                        'nome'  => 'República Centro-Africana',
                        'sigla' => 'CF',
                        'ISO2'  => 'CF',
                        'ISO3'  => 'CAF',
                        'ISON'  => '140',
                    ]
            ],
            [
            'id' => 195,
            'data' => [ 
                        'nome'  => 'República Democrática do Congo',
                        'sigla' => 'CD',
                        'ISO2'  => 'CD',
                        'ISO3'  => 'COD',
                        'ISON'  => '180',
                    ]
            ],
            [
            'id' => 196,
            'data' => [ 
                        'nome'  => 'República do Congo',
                        'sigla' => 'CG',
                        'ISO2'  => 'CG',
                        'ISO3'  => 'COG',
                        'ISON'  => '178',
                    ]
            ],
            [
            'id' => 197,
            'data' => [ 
                        'nome'  => 'República Dominicana',
                        'sigla' => 'DO',
                        'ISO2'  => 'DO',
                        'ISO3'  => 'DOM',
                        'ISON'  => '214',
                    ]
            ],
            [
            'id' => 198,
            'data' => [ 
                        'nome'  => 'Romênia',
                        'sigla' => 'RO',
                        'ISO2'  => 'RO',
                        'ISO3'  => 'ROU',
                        'ISON'  => '642',
                    ]
            ],
            [
            'id' => 199,
            'data' => [ 
                        'nome'  => 'Ruanda',
                        'sigla' => 'RW',
                        'ISO2'  => 'RW',
                        'ISO3'  => 'RWA',
                        'ISON'  => '646',
                    ]
            ],
            [
            'id' => 200,
            'data' => [ 
                        'nome'  => 'Rússia',
                        'sigla' => 'RU',
                        'ISO2'  => 'RU',
                        'ISO3'  => 'RUS',
                        'ISON'  => '643',
                    ]
            ],
            [
            'id' => 201,
            'data' => [ 
                        'nome'  => 'Saara Ocidental',
                        'sigla' => 'EH',
                        'ISO2'  => 'EH',
                        'ISO3'  => 'ESH',
                        'ISON'  => '732',
                    ]
            ],
            [
            'id' => 202,
            'data' => [ 
                        'nome'  => 'Samoa',
                        'sigla' => 'WS',
                        'ISO2'  => 'WS',
                        'ISO3'  => 'WSM',
                        'ISON'  => '882',
                    ]
            ],
            [
            'id' => 203,
            'data' => [ 
                        'nome'  => 'Samoa Americana',
                        'sigla' => 'AS',
                        'ISO2'  => 'AS',
                        'ISO3'  => 'ASM',
                        'ISON'  => '16',
                    ]
            ],
            [
            'id' => 204,
            'data' => [ 
                        'nome'  => 'Santa Helena, Ascensão e Tristão da Cunha',
                        'sigla' => 'SH',
                        'ISO2'  => 'SH',
                        'ISO3'  => 'SHN',
                        'ISON'  => '654',
                    ]
            ],
            [
            'id' => 205,
            'data' => [ 
                        'nome'  => 'Santa Lúcia',
                        'sigla' => 'LC',
                        'ISO2'  => 'LC',
                        'ISO3'  => 'LCA',
                        'ISON'  => '662',
                    ]
            ],
            [
            'id' => 206,
            'data' => [ 
                        'nome'  => 'Santo Bartolomeu',
                        'sigla' => 'BL',
                        'ISO2'  => 'BL',
                        'ISO3'  => 'BLM',
                        'ISON'  => '652',
                    ]
            ],
            [
            'id' => 207,
            'data' => [ 
                        'nome'  => 'São Marino',
                        'sigla' => 'SM',
                        'ISO2'  => 'SM',
                        'ISO3'  => 'SMR',
                        'ISON'  => '674',
                    ]
            ],
            [
            'id' => 208,
            'data' => [ 
                        'nome'  => 'São Martinho',
                        'sigla' => 'MF',
                        'ISO2'  => 'MF',
                        'ISO3'  => 'MAF',
                        'ISON'  => '663',
                    ]
            ],
            [
            'id' => 209,
            'data' => [ 
                        'nome'  => 'São Pedro e Miquelon',
                        'sigla' => 'PM',
                        'ISO2'  => 'PM',
                        'ISO3'  => 'SPM',
                        'ISON'  => '666',
                    ]
            ],
            [
            'id' => 210,
            'data' => [ 
                        'nome'  => 'São Tomé e Príncipe',
                        'sigla' => 'ST',
                        'ISO2'  => 'ST',
                        'ISO3'  => 'STP',
                        'ISON'  => '678',
                    ]
            ],
            [
            'id' => 211,
            'data' => [ 
                        'nome'  => 'São Vicente e as Granadinas',
                        'sigla' => 'VC',
                        'ISO2'  => 'VC',
                        'ISO3'  => 'VCT',
                        'ISON'  => '670',
                    ]
            ],
            [
            'id' => 212,
            'data' => [ 
                        'nome'  => 'Senegal',
                        'sigla' => 'SN',
                        'ISO2'  => 'SN',
                        'ISO3'  => 'SEN',
                        'ISON'  => '686',
                    ]
            ],
            [
            'id' => 213,
            'data' => [ 
                        'nome'  => 'Serra Leoa',
                        'sigla' => 'SL',
                        'ISO2'  => 'SL',
                        'ISO3'  => 'SLE',
                        'ISON'  => '694',
                    ]
            ],
            [
            'id' => 214,
            'data' => [ 
                        'nome'  => 'Sérvia',
                        'sigla' => 'RS',
                        'ISO2'  => 'RS',
                        'ISO3'  => 'SRB',
                        'ISON'  => '688',
                    ]
            ],
            [
            'id' => 215,
            'data' => [ 
                        'nome'  => 'Seychelles',
                        'sigla' => 'SC',
                        'ISO2'  => 'SC',
                        'ISO3'  => 'SYC',
                        'ISON'  => '690',
                    ]
            ],
            [
            'id' => 216,
            'data' => [ 
                        'nome'  => 'Sint Maarten',
                        'sigla' => 'SX',
                        'ISO2'  => 'SX',
                        'ISO3'  => 'SXM',
                        'ISON'  => '534',
                    ]
            ],
            [
            'id' => 217,
            'data' => [ 
                        'nome'  => 'Síria',
                        'sigla' => 'SY',
                        'ISO2'  => 'SY',
                        'ISO3'  => 'SYR',
                        'ISON'  => '760',
                    ]
            ],
            [
            'id' => 218,
            'data' => [ 
                        'nome'  => 'Somália',
                        'sigla' => 'SO',
                        'ISO2'  => 'SO',
                        'ISO3'  => 'SOM',
                        'ISON'  => '706',
                    ]
            ],
            [
            'id' => 219,
            'data' => [ 
                        'nome'  => 'Sri Lanka',
                        'sigla' => 'LK',
                        'ISO2'  => 'LK',
                        'ISO3'  => 'LKA',
                        'ISON'  => '144',
                    ]
            ],
            [
            'id' => 220,
            'data' => [ 
                        'nome'  => 'St. Kitts e Nevis',
                        'sigla' => 'KN',
                        'ISO2'  => 'KN',
                        'ISO3'  => 'KNA',
                        'ISON'  => '659',
                    ]
            ],
            [
            'id' => 221,
            'data' => [ 
                        'nome'  => 'Sudão',
                        'sigla' => 'SD',
                        'ISO2'  => 'SD',
                        'ISO3'  => 'SDN',
                        'ISON'  => '729',
                    ]
            ],
            [
            'id' => 222,
            'data' => [ 
                        'nome'  => 'Sudão do Sul',
                        'sigla' => 'SS',
                        'ISO2'  => 'SS',
                        'ISO3'  => 'SSD',
                        'ISON'  => '728',
                    ]
            ],
            [
            'id' => 223,
            'data' => [ 
                        'nome'  => 'Suécia',
                        'sigla' => 'SE',
                        'ISO2'  => 'SE',
                        'ISO3'  => 'SWE',
                        'ISON'  => '752',
                    ]
            ],
            [
            'id' => 224,
            'data' => [ 
                        'nome'  => 'Suíça',
                        'sigla' => 'CH',
                        'ISO2'  => 'CH',
                        'ISO3'  => 'CHE',
                        'ISON'  => '756',
                    ]
            ],
            [
            'id' => 225,
            'data' => [ 
                        'nome'  => 'Suriname',
                        'sigla' => 'SR',
                        'ISO2'  => 'SR',
                        'ISO3'  => 'SUR',
                        'ISON'  => '740',
                    ]
            ],
            [
            'id' => 226,
            'data' => [ 
                        'nome'  => 'Svalbard e Jan Mayen',
                        'sigla' => 'SJ',
                        'ISO2'  => 'SJ',
                        'ISO3'  => 'SJM',
                        'ISON'  => '744',
                    ]
            ],
            [
            'id' => 227,
            'data' => [ 
                        'nome'  => 'Tailândia',
                        'sigla' => 'TH',
                        'ISO2'  => 'TH',
                        'ISO3'  => 'THA',
                        'ISON'  => '764',
                    ]
            ],
            [
            'id' => 228,
            'data' => [ 
                        'nome'  => 'Taiwan',
                        'sigla' => 'TW',
                        'ISO2'  => 'TW',
                        'ISO3'  => 'TWN',
                        'ISON'  => '158',
                    ]
            ],
            [
            'id' => 229,
            'data' => [ 
                        'nome'  => 'Tajiquistão',
                        'sigla' => 'TJ',
                        'ISO2'  => 'TJ',
                        'ISO3'  => 'TJK',
                        'ISON'  => '762',
                    ]
            ],
            [
            'id' => 230,
            'data' => [ 
                        'nome'  => 'Tanzânia',
                        'sigla' => 'TZ',
                        'ISO2'  => 'TZ',
                        'ISO3'  => 'TZA',
                        'ISON'  => '834',
                    ]
            ],
            [
            'id' => 231,
            'data' => [ 
                        'nome'  => 'Tcheca',
                        'sigla' => 'CZ',
                        'ISO2'  => 'CZ',
                        'ISO3'  => 'CZE',
                        'ISON'  => '203',
                    ]
            ],
            [
            'id' => 232,
            'data' => [ 
                        'nome'  => 'Território Britânico do Oceano Índico',
                        'sigla' => 'IO',
                        'ISO2'  => 'IO',
                        'ISO3'  => 'IOT',
                        'ISON'  => '86',
                    ]
            ],
            [
            'id' => 233,
            'data' => [ 
                        'nome'  => 'Territórios Franceses do Sul e Antártico',
                        'sigla' => 'TF',
                        'ISO2'  => 'TF',
                        'ISO3'  => 'ATF',
                        'ISON'  => '260',
                    ]
            ],
            [
            'id' => 234,
            'data' => [ 
                        'nome'  => 'Timor Leste',
                        'sigla' => 'TL',
                        'ISO2'  => 'TL',
                        'ISO3'  => 'TLS',
                        'ISON'  => '626',
                    ]
            ],
            [
            'id' => 235,
            'data' => [ 
                        'nome'  => 'Togo',
                        'sigla' => 'TG',
                        'ISO2'  => 'TG',
                        'ISO3'  => 'TGO',
                        'ISON'  => '768',
                    ]
            ],
            [
            'id' => 236,
            'data' => [ 
                        'nome'  => 'Tokelau',
                        'sigla' => 'TK',
                        'ISO2'  => 'TK',
                        'ISO3'  => 'TKL',
                        'ISON'  => '772',
                    ]
            ],
            [
            'id' => 237,
            'data' => [ 
                        'nome'  => 'Tonga',
                        'sigla' => 'TO',
                        'ISO2'  => 'TO',
                        'ISO3'  => 'TON',
                        'ISON'  => '776',
                    ]
            ],
            [
            'id' => 238,
            'data' => [ 
                        'nome'  => 'Trinidad e Tobago',
                        'sigla' => 'TT',
                        'ISO2'  => 'TT',
                        'ISO3'  => 'TTO',
                        'ISON'  => '780',
                    ]
            ],
            [
            'id' => 239,
            'data' => [ 
                        'nome'  => 'Tunísia',
                        'sigla' => 'TN',
                        'ISO2'  => 'TN',
                        'ISO3'  => 'TUN',
                        'ISON'  => '788',
                    ]
            ],
            [
            'id' => 240,
            'data' => [ 
                        'nome'  => 'Turcomenistão',
                        'sigla' => 'TM',
                        'ISO2'  => 'TM',
                        'ISO3'  => 'TKM',
                        'ISON'  => '795',
                    ]
            ],
            [
            'id' => 241,
            'data' => [ 
                        'nome'  => 'Turquia',
                        'sigla' => 'TR',
                        'ISO2'  => 'TR',
                        'ISO3'  => 'TUR',
                        'ISON'  => '792',
                    ]
            ],
            [
            'id' => 242,
            'data' => [ 
                        'nome'  => 'Tuvalu',
                        'sigla' => 'TV',
                        'ISO2'  => 'TV',
                        'ISO3'  => 'TUV',
                        'ISON'  => '798',
                    ]
            ],
            [
            'id' => 243,
            'data' => [ 
                        'nome'  => 'Ucrânia',
                        'sigla' => 'UA',
                        'ISO2'  => 'UA',
                        'ISO3'  => 'UKR',
                        'ISON'  => '804',
                    ]
            ],
            [
            'id' => 244,
            'data' => [ 
                        'nome'  => 'Uganda',
                        'sigla' => 'UG',
                        'ISO2'  => 'UG',
                        'ISO3'  => 'UGA',
                        'ISON'  => '800',
                    ]
            ],
            [
            'id' => 245,
            'data' => [ 
                        'nome'  => 'Uzbequistão',
                        'sigla' => 'UZ',
                        'ISO2'  => 'UZ',
                        'ISO3'  => 'UZB',
                        'ISON'  => '860',
                    ]
            ],
            [
            'id' => 246,
            'data' => [ 
                        'nome'  => 'Vanuatu',
                        'sigla' => 'VU',
                        'ISO2'  => 'VU',
                        'ISO3'  => 'VUT',
                        'ISON'  => '548',
                    ]
            ],
            [
            'id' => 247,
            'data' => [ 
                        'nome'  => 'Vietnã',
                        'sigla' => 'VN',
                        'ISO2'  => 'VN',
                        'ISO3'  => 'VNM',
                        'ISON'  => '704',
                    ]
            ],
            [
            'id' => 248,
            'data' => [ 
                        'nome'  => 'Wallis e Futuna',
                        'sigla' => 'WF',
                        'ISO2'  => 'WF',
                        'ISO3'  => 'WLF',
                        'ISON'  => '876',
                    ]
            ],
            [
            'id' => 249,
            'data' => [ 
                        'nome'  => 'Zâmbia',
                        'sigla' => 'ZM',
                        'ISO2'  => 'ZM',
                        'ISO3'  => 'ZMB',
                        'ISON'  => '894',
                    ]
            ],
            [
            'id' => 250,
            'data' => [ 
                        'nome'  => 'Zimbábue',
                        'sigla' => 'ZW',
                        'ISO2'  => 'ZW',
                        'ISO3'  => 'ZWE',
                        'ISON'  => '716',
                    ]
            ]

        ];


        foreach ($paises as $pais) {
            Pais::firstOrCreate(['id' => $pais['id']], $pais['data']);
        }






    }
}
