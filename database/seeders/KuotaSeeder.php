<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kuotas')->delete();

        $kuotas = array(
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-01', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-02', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-03', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-04', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-05', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-06', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-07', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-08', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-09', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-10', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-11', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-12', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-13', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-14', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-15', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-16', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-17', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-18', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-19', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-20', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-21', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-22', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-23', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-24', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-25', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-26', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-27', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-28', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-29', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-30', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '1', 'tanggal_pendakian' => '2022-01-31', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-01', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-02', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-03', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-04', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-05', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-06', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-07', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-08', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-09', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-10', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-11', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-12', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-13', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-14', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-15', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-16', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-17', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-18', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-19', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-20', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-21', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-22', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-23', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-24', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-25', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-26', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-27', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '2', 'tanggal_pendakian' => '2022-02-28', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-01', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-02', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-03', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-04', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-05', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-06', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-07', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-08', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-09', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-10', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-11', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-12', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-13', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-14', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-15', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-16', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-17', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-18', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-19', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-20', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-21', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-22', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-23', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-24', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-25', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-26', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-27', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-28', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-29', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-30', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
            array('periode_id' => '3', 'tanggal_pendakian' => '2022-03-31', 'kuota' => '100', 'created_at' => '2021-12-31', 'updated_at' => '2021-12-3'),
        );
        DB::table('kuotas')->insert($kuotas);
    }
}
