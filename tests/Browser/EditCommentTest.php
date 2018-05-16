<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;
use \App\PostComment;
use Illuminate\Support\Facades\Schema;

class EditCommentTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
	 /**
     * @group EditCommentTest
     */
    public function testEditComment()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/groups')
					->click('#btn-newgroup')
					->pause(500)
					->script('window.scrollTo(0, 500);');

					$browser->click('@editCommentButton')
					->pause(1500)
					->type('comment_update','Modifica commento di test')
					->pause(1000)															
					->press('Update');
			$this->assertDatabaseHas('post_comments', ['comment_content' => 'Modifica commento di test',]);
        });
		$comment = PostComment::where('comment_content', '=', 'Modifica commento di test')->update(['comment_content' => 'Primo Commento']);
    }
}
