<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Schema;
use \App\User;
use \App\Publication;

class CreatePublicationType3Test extends DuskTestCase
{
    /**
     *
     * @return void
     */

	 /**
     * @group CreatePublicationType3Test
     */
    public function testCreatePublication3()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/users')
					->click('@newPublicationButton')
					->type('title','Pubblicazione di prova')
					->select('authors[]',' ')
					->select('authors[]')
					->append('publication_date', '01011999')
					->type('venue','venue di test')
					->select('topics[]','Usability')
					->pause(100)
					->select('type','editorship')
					->script('window.scrollTo(0, 500);');
					
			$browser->pause(1500)
					->press('Next')
					->script('window.scrollTo(0, -500);');

					$browser->pause(1500)->type('editorship_abstract','test')
					->type('editorship_key','conf/um/ArditoBDM17')
					->script('window.scrollTo(0, 500);');
					
					$browser->type('editorship_doi','10.1145/3099023.3099089')
					->type('editorship_ee','http://doi.acm.org/10.1145/3099023.3099089')
					->type('editorship_url','http://dblp.org/rec/conf/um/ArditoBDM17')
					->pause(1500)
					->click('@button3Next')
					->pause(500)
					->attach('pdf_file',storage_path('app/public/Test_Pdf.pdf'))
					->attach('media_file[]',storage_path('app/public/test_image_upload.jpg')) 
					->click('@buttonCreate')
					->pause(1500)
					->assertSee('Publications');
			$this->assertDatabaseHas('publications', ['title' => 'Pubblicazione di prova',]);
        });
		
		Schema::disableForeignKeyConstraints();
		$publication = Publication::where('title', '=', 'Pubblicazione di prova')->delete();
    }
}
