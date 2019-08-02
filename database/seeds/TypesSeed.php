<?php

use Illuminate\Database\Seeder;

class TypesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\Types::create([
         	'id' =>	1,
        	'types' => 'Bruto'
        ]);

         App\Types::create([
         	'id' =>	2,
        	'types' => 'Master'
        ]);

         App\Types::create([
            'id' => 3,
            'types' => 'Master x2'
        ]);

         App\Types::create([
            'id' => 4,
            'types' => 'Master x3'
        ]);
    }
}
