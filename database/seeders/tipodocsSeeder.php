<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class tipodocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_docs')->insert([
            'nombre' => 'Formato'

        ]);

        DB::table('tipo_docs')->insert([
            'nombre' => 'Procedimiento'

        ]);

        DB::table('tipo_docs')->insert([
            'nombre' => 'Instructivo'

        ]);


    }
}
