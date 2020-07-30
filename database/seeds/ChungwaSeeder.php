<?php

use Illuminate\Database\Seeder;

class ChungwaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('chungwas')->insert([
            [
                'name' => 'Jacob',
            ],
            [
                'name' => 'Jbae'
            ]]);
    }
}
