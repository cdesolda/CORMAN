<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('login'))
            ->type('email','pymvale10@gmail.com')
            ->type('password','123456')
            ->press('Login')
            ->assertSee('Dashboard');
        });
    }
}
