<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(UserSeed::class);
        $this->call(TypesSeed::class);
        $this->call(AudioChannelsSeed::class);
        $this->call(VersionesSeed::class);
    }
}
