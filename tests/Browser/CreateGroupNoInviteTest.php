<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Schema;
use \App\User;
use \App\Group;

class CreateGroupNoInviteTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
	 
	 /**
     * @group CreateGroupNoInviteTest
     */
    public function testCreateGroupNoInvite()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/users')
					->click('@newGroupButton')
					->type('name','Gruppo di prova')
					->pause(500)
					->type('description','Descrizione del gruppo...')
					->script('window.scrollTo(0, 200);');

			$browser->pause(100)
					->select('topics[]','Usability')
					->attach('picture',storage_path('app/public/testgroup_upload.jpg')) 
					->pause(500)
					->press('Create')
					->assertSee('Gruppo di prova');
			$this->assertDatabaseHas('groups', ['name' => 'Gruppo di prova',]);
        });
		Schema::disableForeignKeyConstraints();
		$group = Group::where('name', '=', 'Gruppo di prova')->delete();
    }
}
