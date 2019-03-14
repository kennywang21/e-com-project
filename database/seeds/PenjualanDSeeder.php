<?php

use Illuminate\Database\Seeder;

use App\PenjualanD;

class PenjualanDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      PenjualanD::insert([
            [
            	'penjualan_id' => 1,
                'qty'      => 2,
                'harga' => 10000,
                'barang' => 'Baju A',
            ],
            [
            	'penjualan_id' => 1,
                'qty'      => 1,
                'harga' => 30000,
                'barang' => 'Baju B',
            ],
            [
            	'penjualan_id' => 1,
                'qty'      => 4,
                'harga' => 20000,
                'barang' => 'Baju C',
            ],
            [
            	'penjualan_id' => 2,
                'qty'      => 2,
                'harga' => 10000,
                'barang' => 'Pensil A',
            ],
            [
            	'penjualan_id' => 2,
                'qty'      => 5,
                'harga' => 30000,
                'barang' => 'Pensil B',
            ],
            [
            	'penjualan_id' => 2,
                'qty'      => 4,
                'harga' => 10000,
                'barang' => 'Pensil C',
            ],
            [
            	'penjualan_id' => 3,
                'qty'      => 2,
                'harga' => 15000,
                'barang' => 'Meja A',
            ],
            [
            	'penjualan_id' => 3,
                'qty'      => 1,
                'harga' => 30000,
                'barang' => 'Meja B',
            ],
            [
            	'penjualan_id' => 3,
                'qty'      => 1,
                'harga' => 22000,
                'barang' => 'Meja C',
            ],
            [
            	'penjualan_id' => 4,
                'qty'      => 2,
                'harga' => 15000,
                'barang' => 'Celana A',
            ],
            [
            	'penjualan_id' => 4,
                'qty'      => 2,
                'harga' => 35000,
                'barang' => 'Celana B',
            ],
            [
            	'penjualan_id' => 4,
                'qty'      => 4,
                'harga' => 20000,
                'barang' => 'Celana C',
            ],
            [
            	'penjualan_id' => 5,
                'qty'      => 1,
                'harga' => 50000,
                'barang' => 'Minyak Angin A',
            ],
            [
            	'penjualan_id' => 5,
                'qty'      => 4,
                'harga' => 10000,
                'barang' => 'Minyak Angin B',
            ],
            [
            	'penjualan_id' => 5,
                'qty'      => 4,
                'harga' => 20000,
                'barang' => 'Minyak Angin C',
            ],
        ]);
    }
}
