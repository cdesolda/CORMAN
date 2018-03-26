<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$role1 = new Role;
    	$role1->name = 'Researcher';
    	$role1->save();

    	$role2 = new Role;
    	$role2->name = 'Ordinary Professor';
    	$role2->save();

	    $role3 = new Role;
    	$role3->name = 'Associate Professor';
    	$role3->save();

    	$role4 = new Role;
    	$role4->name = 'Assistant Professor';
    	$role4->save();
    }


}
