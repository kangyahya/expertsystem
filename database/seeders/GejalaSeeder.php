<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $dataGejala = [
        [
          'symptom_code'=> 'G1',
          'symptom_name' => 'Parasit berbentuk jangkar/kail menempel pada permukaan tubuh, lubang hidung, pangkal sirip, insang, dan rongga pipi'
        ],
        [
          'symptom_code'=>'G2',
          'symptom_name'=> 'Pendarahan di area menempelnya parasit berbentuk jangkar'
        ],
        [
          'symptom_code'=>'G3',
          'symptom_name'=>'Warna tubuh ikan pucat atau memudar'
        ],
        [
          'symptom_code'=>'G4',
          'symptom_name'=>'Nafsu makan menurun,ikan tidak seperti biasanya dan ikan tidak mau makan'
        ],
        [
          'symptom_code'=>'G5',
          'symptom_name'=>'Ikan sulit bernafas, sering megap-megap dan muncul ke permukaan'
        ],

        ['symptom_code'=>'G6','symptom_name'=>'Lendir berlebihan, ikan terlihat mengkilap'],
        ['symptom_code'=>'G7','symptom_name'=>'Ikan sering berkumpul di saluran air masuk'],
        ['symptom_code'=>'G8','symptom_name'=>'Ikan mengosok-gosokkan badannya pada benda keras'],
        ['symptom_code'=>'G9','symptom_name'=>'Bercak merah atau hitam di badan ikan'],
        ['symptom_code'=>'G10','symptom_name'=>'Sisik terkelupas'],
        ['symptom_code'=>'G11', 'symptom_name'=>	'Ikan berenang dengan cara melonjak-lonjak'],
        ['symptom_code'=>'G12', 'symptom_name'=>	'	Ikan lemah dan berenang lambat'],
        ['symptom_code'=>'G13', 'symptom_name'=>	'Warna tubuh jadi gelap kehitaman'],
        ['symptom_code'=>'G14', 'symptom_name'=>	'	Bercak merah berbentuk bulat atau tidak teratur terdapat pada tubuh, pangkal sirip, dan dubur'],
        ['symptom_code'=>'G15', 'symptom_name'=>	'	Ikan berkumpul di saluran pembuangan'],
        ['symptom_code'=>'G16', 'symptom_name'=>	'	Perut buncit'],
        ['symptom_code'=>'G17', 'symptom_name'=>	'	Eksopthalmia atau mata menonjol dan mata rusak seperti katarak'],
        ['symptom_code'=>'G18', 'symptom_name'=>	'	Benang-benang halus menyerupai kapas yang menempel pada kulit, sirip, kepala, dan tutup insang ikan'],
        ['symptom_code'=>'G19', 'symptom_name'=>	'	Muncul bintik putih pada kulit, ekor, dan sirip'],
        ['symptom_code'=>'G20', 'symptom_name'=>	'	Bintik putih ke abu-abuan dan disertai pendarahan di permukaan tubuh dan sirip'],
        ['symptom_code'=>'G21', 'symptom_name'=>	'	Adanya putih seperti kapas yang tumbuh di kulit, sisik, dan sirip'],
        ['symptom_code'=>'G22', 'symptom_name'=>	'	Pendarahan pada area tempat munculnya kapas'],
        ['symptom_code'=>'G23', 'symptom_name'=>	'	Suhu air mencapai 16°C dan ikan malas bergerak atau berenang sehingga daya tahan tubuh lemah dan menyendiri'],
        ['symptom_code'=>'G24', 'symptom_name'=>	'	Terdapatnya luka pada area ekor (penducle)'],
        ['symptom_code'=>'G25', 'symptom_name'=>	'	Luka-luka pada bagian kulit dan meluas ke seluruh tubuh'],
        ['symptom_code'=>'G26', 'symptom_name'=>	'	Ada bisul atau nanah disekitar luka disertai bau busuk'],
        ['symptom_code'=>'G27'	, 'symptom_name'=>	'Pada badan ikan di tempeli oleh kutu ikan'],
        ['symptom_code'=>'G28','symptom_name'=>'	Ikan nila kurus, berat ikan kurang dari 400 gr selama 4 bulan'],
        ['symptom_code'=>'G29','symptom_name'=>'	Adanya pendarahan pada bagian perut bawah'],
        ['symptom_code'=>'G30','symptom_name'=>'	Garis vertikal tubuh menghitam'],
        ['symptom_code'=>'G31','symptom_name'=>'	Berenang berputar'],
        ['symptom_code'=>'G32','symptom_name'=>'	Badan bengkok berbentuk “C”'],
        ['symptom_code'=>'G33','symptom_name'=>'	Ada bisul di atas kepala ikan'],
        ['symptom_code'=>'G34','symptom_name'=>'	Kornea mata menyusut dan cekung ke dalam'],
        ['symptom_code'=>'G35','symptom_name'=>'Rongga perut atau perut bagian bawah terlihat membengkak.'],
        [
          'symptom_code'=>'G36',
          'symptom_name'=>'Adanya bisul di permukaan kulit'
        ],
      ];
      DB::table('symptoms')->insert($dataGejala);
    }
}
