<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Schema;
use \App\User;
use \App\Group;

class EditGroupTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
	 
	 /**
     * @group EditGroupTest
     */
    public function testEditGroup()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/groups')
					->click('@editGroupBtn')
					->pause(500)
					->attach('profile_photo',storage_path('app/public/testgroup_upload.jpg'))
					->type('group_name','UX Bari')
					->type('description','this is Test group')
					->pause(500)
					->script('window.scrollTo(0, 600);');

			$browser->pause(500)
					->select('topics[]','Usability')
					->press("Update")
					->pause(1000)
					->assertSee("UX Bari");
			$this->assertDatabaseHas('groups', ['name' => 'UX Bari','description' => 'this is Test group',]);
        });
		$group = Group::where('description', '=', 'this is Test group')->update(['description' => 'this is the first group about UX in Bari']);
    }
}
