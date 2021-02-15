<?php

use Illuminate\Database\Seeder;
use App\Agenda;
use Carbon\Carbon;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $dt = Carbon::now();
        // $dateNow = $dt->toDateTimeString();

        $agenda = [
            [
                'user_id' => 1,
                'acara' => 'Rapat Koordinasi PPK Ditjen Aptika',
                'tempat' => 'PR. Ali Murtopo Lantai 3 Kominfo',
                'mulai' => Carbon::now()->format('Y-m-d H:i:s'),
                'selesai' => Carbon::now()->format('Y-m-d H:i:s'),
                'disposisi' => 'Dijadwalkan',
                'satker' => 'SetDj',
                'jenis' => "int",
                'slide' => rand(1, 3)
            ],
            [
                'user_id' => 1,
                'acara' => 'Rapat Koordinasi PPK Ditjen Aptika',
                'tempat' => 'PR. Ali Murtopo Lantai 3 Kominfo',
                'mulai' => Carbon::now()->format('Y-m-d H:i:s'),
                'selesai' => Carbon::now()->format('Y-m-d H:i:s'),
                'disposisi' => 'Dijadwalkan',
                'satker' => 'SetDj',
                'jenis' => "pub",
                'slide' => rand(1, 2)
            ],
            [
                'user_id' => 1,
                'acara' => 'Rapat Koordinasi PPK Ditjen Aptika',
                'tempat' => 'PR. Ali Murtopo Lantai 3 Kominfo',
                'mulai' => Carbon::now()->format('Y-m-d H:i:s'),
                'selesai' => Carbon::now()->format('Y-m-d H:i:s'),
                'disposisi' => 'Dijadwalkan',
                'satker' => 'SetDj',
                'jenis' => 'und',
                'slide' => rand(2, 3)
            ],
            [
                'user_id' => 1,
                'acara' => 'Rapat Koordinasi PPK Ditjen Aptika',
                'tempat' => 'PR. Ali Murtopo Lantai 3 Kominfo',
                'mulai' => Carbon::now()->format('Y-m-d H:i:s'),
                'selesai' => Carbon::now()->format('Y-m-d H:i:s'),
                'disposisi' => 'Dijadwalkan',
                'satker' => 'SetDj',
                'jenis' => 'bat',
                'slide' => rand(2, 3)
            ],
            [
                'user_id' => 1,
                'acara' => 'Rapat Koordinasi PPK Ditjen Aptika',
                'tempat' => 'PR. Ali Murtopo Lantai 3 Kominfo',
                'mulai' => Carbon::now()->format('Y-m-d H:i:s'),
                'selesai' => Carbon::now()->format('Y-m-d H:i:s'),
                'disposisi' => 'Dijadwalkan',
                'satker' => 'SetDj',
                'jenis' => 'int',
                'slide' => rand(1, 3)
            ],
            [
                'user_id' => 1,
                'acara' => 'Rapat Koordinasi PPK Ditjen Aptika',
                'tempat' => 'PR. Ali Murtopo Lantai 3 Kominfo',
                'mulai' => Carbon::now()->format('Y-m-d H:i:s'),
                'selesai' => Carbon::now()->format('Y-m-d H:i:s'),
                'disposisi' => 'Dijadwalkan',
                'satker' => 'SetDj',
                'jenis' => 'pub',
                'slide' => rand(2, 3)
            ]
            ];

            // $count = 100;
            // factory(Agenda::class, $count)->create();

            Agenda::insert($agenda);
    }
}
