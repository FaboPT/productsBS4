<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            [   'name' =>'Placa de Rede',
                'cost' =>100.29,
                'created_at'=>\Carbon\Carbon::now(),
            ],
            [   'name' =>'Smartphone',
                'cost' =>1000,
                'created_at' =>\Carbon\Carbon::now(),
            ],
            [   'name' =>'Computador',
                'cost' =>5000.40,
                'created_at' =>\Carbon\Carbon::now(),
            ],
        ]);
    }
}
