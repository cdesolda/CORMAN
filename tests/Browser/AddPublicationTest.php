<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;

class AddPublicationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/groups')
					->click('#btn-newgroup')
					->click('@shareButton')
					->pause(1500)
					->check('btSelectAll')
					->click('#addTo')
					->pause(1500)
					->assertSee('Your Publication has been added in group');
        });
    }
}
