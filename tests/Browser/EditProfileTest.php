<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Schema;
use \App\User;
use \App\Group;

class EditProfileTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
	 
	 /**
     * @group EditProfileTest
     */
    public function testEditProfile()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('users/1/edit')
					->pause(500)
					->attach('user_pic',storage_path('app/public/test_upload.png')) 
					->type('first_name','Paolo')
					->type('last_name','Buono')
					->append('dob', '01011999')
					->pause(500)
					->script('window.scrollTo(0, 1000);');

			$browser->pause(500)
					->press('Submit');
			$this->assertDatabaseHas('users', ['birth_date' => '1999-01-01',]);
        });
		$user = User::find(1);
		$user->birth_date ='1980-01-01';
		$user->save();
    }
}
