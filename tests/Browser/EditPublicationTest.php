<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Schema;
use \App\User;
use \App\Group;
use \App\Publication;

class EditPublicationTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
	 
	 /**
     * @group EditPublicationTest
     */
    public function testEditPublication()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('publications/1/edit')
					->type('title','Empowering CH Experts To Produce IoT-enhanced Visits.')
					->pause(500)
					->append('pub_date','01012010')
					->pause(1000)
					->type('venue','IMAP')
					->select('topics[]','Usability')
					->script('window.scrollTo(0, 1100);');

			$browser->pause(1500)
					->attach('pdf_file',storage_path('app/public/Test_Pdf.pdf'))
					->attach('media_file[]',storage_path('app/public/test_image_upload.jpg')) 
					->press('Update')
					->assertSee('Publications');
			$this->assertDatabaseHas('publications', ['title' => 'Empowering CH Experts To Produce IoT-enhanced Visits.',]);
        });
		$publication = Publication::where('title', '=', 'Empowering CH Experts To Produce IoT-enhanced Visits.')->update(['year' => '2016-01-01']);
    }
}
