<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaction = new \App\Models\Transaction([
            'txID' => 'TX12345678901234',
            'txDate' => '2022-12-05',
            'txPayMethod' => 'Cash',
            'txCustEmail' => 'fred.flintstone@example.com',
            'txComments' => 'Car has no engine'
        ]);
        $transaction->save();
        $transaction = new \App\Models\Transaction([
            'txID' => 'TX00011122233344',
            'txDate' => '2022-12-06',
            'txPayMethod' => 'Credit',
            'txCustEmail' => 'barney.rubble@example.com',
            'txComments' => 'Staff discount applied'
        ]);
        $transaction->save();
    }
}
