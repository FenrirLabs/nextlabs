<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'name' => 'Fulano1',
            'telephone' => '+351999999999',
            'cc_id' => '25425245255',
            'iban' => '225425552554',
            'debit_balance' => '35000'
        ]);

        DB::table('clientes')->insert([
            'name' => 'Ciclano',
            'telephone' => '+351999999999',
            'cc_id' => '25425245635255',
            'iban' => '5846758',
            'debit_balance' => '35000'
        ]);
    }
}
