<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodes')->delete();

        $periodes = array(
            array('bulan' => 'Januari 2022'),
            array('bulan' => 'Februari 2022'),
            array('bulan' => 'Maret 2022'),
            array('bulan' => 'April 2022'),
            array('bulan' => 'Mei 2022'),
            array('bulan' => 'Juni 2022'),
            array('bulan' => 'Juli 2022'),
            array('bulan' => 'Agustus 2022'),
            array('bulan' => 'September 2022'),
            array('bulan' => 'Oktober 2022'),
            array('bulan' => 'November 2022'),
            array('bulan' => 'Desember 2022'),
            array('bulan' => 'Januari 2023'),
            array('bulan' => 'Februari 2023'),
            array('bulan' => 'Maret 2023'),
            array('bulan' => 'April 2023'),
            array('bulan' => 'Mei 2023'),
            array('bulan' => 'Juni 2023'),
            array('bulan' => 'Juli 2023'),
            array('bulan' => 'Agustus 2023'),
            array('bulan' => 'September 2023'),
            array('bulan' => 'Oktober 2023'),
            array('bulan' => 'November 2023'),
            array('bulan' => 'Desember 2023'),
        );
        DB::table('periodes')->insert($periodes);
    }
}
