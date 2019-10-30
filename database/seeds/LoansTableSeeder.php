<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loans = [
            [
                'token'             => str_random(30),
                'amount'             => 120,
                'percentaje_id'          => 1,
                'amount_payable'        => 132,
                'customer_id'          => 2,
                'user_id'          => 4,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'token'             => str_random(30),
                'amount'             => 80,
                'percentaje_id'          => 1,
                'amount_payable'        => 88,
                'customer_id'          => 3,
                'user_id'          => 4,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'token'             => str_random(30),
                'amount'             => 140,
                'percentaje_id'          => 1,
                'amount_payable'        => 154,
                'customer_id'          => 4,
                'user_id'          => 4,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table('loans')->insert($loans);
        //$this->enableForeignKeys();
    }
}
