<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;
use \App\PostGroup;
use Illuminate\Support\Facades\Schema;

class EditPostTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
	 /**
     * @group EditPostTest
     */
    public function testEditPost()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/groups')
					->click('#btn-newgroup')
					->pause(500)					
					->script('window.scrollTo(0, 500);');

					$browser->click('@editPostButton')					
					->pause(1500)					
					->type('post_update','Modifica post di test')
					->pause(1000)										
					->click('@UpdatePostButton');
			$this->assertDatabaseHas('post_groups', ['post_content' => 'Modifica post di test',]);
        });
		$post = PostGroup::where('post_content', '=', 'Modifica post di test')->update(['post_content' => 'Secondo post di prova']);
    }
}
