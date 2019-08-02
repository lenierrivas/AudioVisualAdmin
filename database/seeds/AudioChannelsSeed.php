<?php

use Illuminate\Database\Seeder;

class AudioChannelsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\Audiochannel::create([
            'id' => 1,
            'audiochannels' => 'Español'
        ]);

         App\Audiochannel::create([
            'id' => 2,
            'audiochannels' => 'Ingles'
        ]);

         App\Audiochannel::create([
            'id' => 3,
            'audiochannels' => 'Ambiente'
        ]);

         App\Audiochannel::create([
            'id' => 4,
            'audiochannels' => 'Fx'
        ]);

         App\Audiochannel::create([
            'id' => 5,
            'audiochannels' => 'Musica'
        ]);
    }
}
