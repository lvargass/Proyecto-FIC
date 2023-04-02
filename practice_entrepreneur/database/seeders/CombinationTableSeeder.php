<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CombinationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('combination_tables')->insert([
            [
                'comuna_id' => 1,
                'rubro_id' => 1,
                'list_documents' => json_encode([
                    'Permiso de manufactura de alimentos',
                    'Permiso de autorización Sanitaria',
                ])
            ],
            [
                'comuna_id' => 1,
                'rubro_id' => 2,
                'list_documents' => json_encode([
                    'Permiso de obras',
                    'Permiso de operatividad',
                    'Conformación de la sociedad.',
                ])
            ],
            [
                'comuna_id' => 1,
                'rubro_id' => 3,
                'list_documents' => json_encode([
                    'Permisos de importación',
                    'Patentes legales de productos en venta.',
                ])
            ],
            // Comuna 2
            [
                'comuna_id' => 2,
                'rubro_id' => 1,
                'list_documents' => json_encode([
                    'Permiso de manufactura de alimentos',
                    'Permiso de autorización Sanitaria y Cédula de identidad',
                ])
            ],
            [
                'comuna_id' => 2,
                'rubro_id' => 2,
                'list_documents' => json_encode([
                    'Permiso de obras',
                    'Permiso de manipulación de alimentos',
                    'Conformación de la sociedad.',
                ])
            ],
            [
                'comuna_id' => 2,
                'rubro_id' => 3,
                'list_documents' => json_encode([
                    'Permisos de importación',
                    'Patente de manufactura de proveedores.',
                ])
            ],
            // Comuna 3
            [
                'comuna_id' => 3,
                'rubro_id' => 1,
                'list_documents' => json_encode([
                    'Permiso de manufactura de alimentos',
                    'Permiso de autorización Sanitaria y Cédula de identidad',
                ])
            ],
            [
                'comuna_id' => 3,
                'rubro_id' => 2,
                'list_documents' => json_encode([
                    'Cédula de identidad',
                    'Copia de traslado inicial de mercaderías y manual de buenas prácticas para la comercialización de productos',
                ])
            ],
            [
                'comuna_id' => 3,
                'rubro_id' => 3,
                'list_documents' => json_encode([
                    'Permisos de importación',
                    'Patente de manufactura de proveedores y Cédula de identidad.',
                ])
            ],
        ]);
    }
}
