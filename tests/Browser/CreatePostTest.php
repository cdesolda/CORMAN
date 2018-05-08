<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;
use \App\PostGroup;
use Illuminate\Support\Facades\Schema;

class CreatePostTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
	 /**
     * @group CreatePostTest
     */
    public function testCreatePost()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/groups')
					->click('#btn-newgroup')
					->pause(500)					
					->script('window.scrollTo(0, 100);');
					
					$browser->type('AddNewPost','Creazione post di test') 
					->pause(1500)
					->click('@postButton')
					->pause(500)
					->assertSee('Your Post has been published!');
			$this->assertDatabaseHas('post_groups', ['post_content' => 'Creazione post di test',]); 
        });
		Schema::disableForeignKeyConstraints();
		$post = PostGroup::where('post_content', '=', 'Creazione post di test')->delete(); 
    }
}
