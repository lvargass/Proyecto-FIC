<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubros')->insert([
            [ 'name' => 'Pastelería', ],
            [ 'name' => 'Minimarket', ],
            [ 'name' => 'Electrónica', ],
        ]);
    }
}
