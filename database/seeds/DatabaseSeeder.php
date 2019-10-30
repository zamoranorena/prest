<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(PercentajeTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(LoansTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
    }
}
