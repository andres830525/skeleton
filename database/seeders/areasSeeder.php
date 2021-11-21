<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Seeder;

class areasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'nombre' => 'Gerencial'

        ]);

        DB::table('areas')->insert([
            'nombre' => 'Contabilidad'

        ]);

        DB::table('areas')->insert([
            'nombre' => 'Gestion Humana'

        ]);

        DB::table('areas')->insert([
            'nombre' => 'Sistemas'

        ]);
    }
}
