<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->disableForeignKeys();
        //$this->truncate('percentajes');

        $payments = [
            [
                'token'             => str_random(30),
                'amount'             => 120,
                'loan_id'          => 1,
                'customer_id'          => 2,
                'user_id'          => 4,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'token'             => str_random(30),
                'amount'             => 80,
                'loan_id'          => 1,
                'customer_id'          => 2,
                'user_id'          => 4,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'token'             => str_random(30),
                'amount'             => 140,
                'loan_id'          => 1,
                'customer_id'          => 2,
                'user_id'          => 4,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table('payments')->insert($payments);
        //$this->enableForeignKeys();
    }
}
