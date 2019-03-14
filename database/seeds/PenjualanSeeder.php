<?php

use Illuminate\Database\Seeder;

use App\Penjualan;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Penjualan::insert([
            [
                'no_faktur'      => 'AD101',
                'deskripsi' => 'deskripsi data 1',
            ],
            [
                'no_faktur'      => 'AD102',
                'deskripsi' => 'deskripsi data 2',
            ],
            [
                'no_faktur'      => 'AD103',
                'deskripsi' => 'deskripsi data 3',
            ],
            [
                'no_faktur'      => 'AD104',
                'deskripsi' => 'deskripsi data 4',
            ],
            [
                'no_faktur'      => 'AD105',
                'deskripsi' => 'deskripsi data 5',
            ]
        ]);
    }
}
