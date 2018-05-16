<?php

namespace Tests\Browser;

use Tests\DuskTestCase;

use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;
use Illuminate\Support\Facades\Schema;

class RegWithSynchronizeTest extends DuskTestCase
{
    /**
     *
     * @return void
     */

	 /**
     * @group RegWithSynchronizeTest
     */	 
    public function testRegNo()
    {
        $this->browse(function ($browser) {
            $browser->visit('/signUp')
            ->type('first_name','Giuseppe')
            ->type('last_name','Desolda')
            ->append('birth_date', '01011989')
            ->type('email','giuseppe.desolda@example.com')
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
			$browser->pause(2500)
			->check('btSelectItem')
			->press('Add to my CORMAN publications')
			->pause(2000)
			->assertSee('Publications Added');
			
			$browser->pause(1000)
			->press('OK')
			->assertPathIs('/users');
			$this->assertDatabaseHas('users', ['first_name' => 'Giuseppe','last_name' => 'Desolda','email' => 'giuseppe.desolda@example.com',]);
			});
		Schema::disableForeignKeyConstraints();
		$user = User::where('email', '=', 'giuseppe.desolda@example.com')->delete();
    }
}
