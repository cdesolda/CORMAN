<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;
use \App\PostComment;
use Illuminate\Support\Facades\Schema;

class CommentTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
	 /**
     * @group CommentTest
     */
    public function testComment()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/groups')
					->click('#btn-newgroup')
					->pause(500)
					->script('window.scrollTo(0, 500);');

					$browser->type('comment_content','Creazione commento di test')
					->pause(1000)
					->click('@commentButton')
					->pause(500);
			$this->assertDatabaseHas('post_comments', ['comment_content' => 'Creazione commento di test',]);
        });
		Schema::disableForeignKeyConstraints();
		$comment = PostComment::where('comment_content', '=', 'Creazione commento di test')->delete();
    }
}
