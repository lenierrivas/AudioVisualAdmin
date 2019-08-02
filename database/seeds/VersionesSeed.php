<?php

use Illuminate\Database\Seeder;

class VersionesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\Versiones::create([
         	'id' =>	1,
        	'Versiones' => 'Tv'
        ]);

         App\Versiones::create([
         	'id' =>	2,
        	'Versiones' => 'Cine'
        ]);

         App\Versiones::create([
            'id' => 3,
            'Versiones' => 'Redes Sociales'
        ]);
    }
}
