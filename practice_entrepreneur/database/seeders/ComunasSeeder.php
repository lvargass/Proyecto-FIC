<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComunasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comunas')->insert([
            [ 'name' => 'Las Condes', ],
            [ 'name' => 'Puente Alto', ],
            [ 'name' => 'La Florida', ],
        ]);
    }
}
