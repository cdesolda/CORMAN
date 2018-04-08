<?php

namespace Tests\Browser;

use Tests\DuskTestCase;

use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;
use Illuminate\Support\Facades\Schema;

class RegistrationTest extends DuskTestCase
{
    /**
     *
     * @return void
     */

	 /**
     * @group RegistrationTest
     */	 
    public function testRegistration()
    {
        $this->browse(function ($browser) {
            $browser->visit('/signUp')
            ->type('first_name','Nome')
            ->type('last_name','Cognome')
            ->append('birth_date', '01011999')
            ->type('email','example@example.com')
            ->type('password','123456')
            ->type('password_confirmation','123456')
            ->script('window.scrollTo(0, 500);');
            $browser
            ->pause(100)
			->attach('profilePic',storage_path('app/public/test_upload.png')) 
            ->pause(100)
            ->press('Next')
            ->pause(500)
            ->select('role','Researcher')
            ->pause(100)          
            ->select('affiliation','Osaka University')
            ->pause(100)
            ->select('topics[]','Usability')
            ->type('personal_link','http://example.com')
            ->press('Submit')
            ->assertPathIs('/syncronize');
			$this->assertDatabaseHas('users', ['first_name' => 'Nome','last_name' => 'Cognome','email' => 'example@example.com',]);
			});
		Schema::disableForeignKeyConstraints();
		$user = User::where('email', '=', 'example@example.com')->delete();
    }
}
