<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;

class CreatePublicationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreatePublication()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/users')
					->click('@newPublicationButton')
					->type('title','Pubblicazione di prova')
					->append('publication_date', '01011999')
					->type('venue','venue di test')
					->select('topics[]','Usability')
					->script('window.scrollTo(0, 500);');
					
			$browser->pause(1500)
					->press('Next')
					->pause(1500)
					->click('@buttonNext')
					->pause(1500)
					->click('@buttonCreate')
					->pause(1500)
					->assertSee('Publications');
        });
    }
}
