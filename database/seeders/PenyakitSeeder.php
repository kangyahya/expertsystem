<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitSeeder extends Seeder
{
    public function run(): void
    {
        $dataPenyakit = [
          ['disease_code' =>'P1', 'disease_name'=>'Lernea'],
          ['disease_code' =>'P2','disease_name'=>  'Cacing Insang dan Kulit'],
          ['disease_code' =>'P3','disease_name'=>	'Bercak Merah'],
          ['disease_code' =>'P4','disease_name'=>	'Saprolegniasis'],
          ['disease_code' =>'P5','disease_name'=>	'Bintik Putih'],
          ['disease_code' =>'P6','disease_name'=>	'Trichodiniasis/penyakit gatal'],
          ['disease_code' =>'P7','disease_name'=>	'Epistylis'],
          ['disease_code' =>'P8','disease_name'=>	'Penducle/ penyakit air dingin'],
          ['disease_code' =>'P9','disease_name'=>	'Edward siella'],
          ['disease_code' =>'P10','disease_name'=>	'Kutu Ikan'],
          ['disease_code' =>'P11','disease_name'=>	'Stereptococcosis'],
          ['disease_code' =>'P12','disease_name'=>	'Tilapia Lake Virus (TiLV)']
        ];
      DB::table('diseases')->insert($dataPenyakit);
    }
}
