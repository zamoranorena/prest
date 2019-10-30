<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
class PercentajeTableSeeder extends Seeder
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

        $percentajes = [
            [
                'token'             => str_random(30),
                'interest'          => 10,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'token'             => str_random(30),
                'interest'              => 20,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'token'             => str_random(30),
                'interest'              => 30,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'token'             => str_random(30),
                'interest'              => 40,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'token'             => str_random(30),
                'interest'              => 50,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table('percentajes')->insert($percentajes);
        //$this->enableForeignKeys();
    }
}
