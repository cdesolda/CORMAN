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
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateGroup()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/users')
					->click('@newGroupButton')
					->type('name','Gruppo di prova')
					->pause(1000)
					->type('description','Descrizione del gruppo...')
					->script('window.scrollTo(0, 500);');

			$browser->select('users[]','David Gilmour')
					->select('topics[]','Usability')
					->pause(1500)
					->press('Create')
					->assertSee('Gruppo di prova');
        });
		Schema::disableForeignKeyConstraints();
		$group = Group::where('name', '=', 'Gruppo di prova')->delete();
    }
}
