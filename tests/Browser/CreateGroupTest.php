<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Schema;
use \App\User;
use \App\Group;

class CreateGroupTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
	 
	 /**
     * @group CreateGroupTest
     */
    public function testCreateGroup()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/users')
					->click('@newGroupButton')
					->type('name','Gruppo di prova')
					->pause(500)
					->type('description','Descrizione del gruppo...')
					->pause(2000)
					->select('users[]','Paolo' ,' Buono')
					->select('users[]')
					->script('window.scrollTo(0, 200);');

			$browser->select('topics[]','Usability')
					->pause(500)
					->attach('picture',storage_path('app/public/testgroup_upload.jpg')) 
					->press('Create')
					->assertSee('Gruppo di prova');
			$this->assertDatabaseHas('groups', ['name' => 'Gruppo di prova',]);
        });
		Schema::disableForeignKeyConstraints();
		$group = Group::where('name', '=', 'Gruppo di prova')->delete();
    }
}
