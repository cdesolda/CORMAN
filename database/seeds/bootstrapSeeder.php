<?php

use Illuminate\Database\Seeder;

class bootstrapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AffiliationTableSeeder::class,
            RoleTableSeeder::class,
            TopicsTableSeeder::class
        ]);


/*
        //TODO Seeder to implement


*/
    }
}
