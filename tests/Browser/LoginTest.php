<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
	 /**
     * @group LoginFailureTest
     */	
    public function testLoginFailure()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('login'))
            ->type('email','login.failure@uniba.it')
            ->type('password','123456')
            ->press('Login')
            ->assertSee('These credentials do not match our records.');
        });
    }
	 /**
     * @group LoginTest
     */	
	public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('login'))
            ->type('email','paolo.buono@uniba.it')
            ->type('password','123456')
            ->press('Login')
            ->assertSee('Dashboard');
        });
    }
	
}
