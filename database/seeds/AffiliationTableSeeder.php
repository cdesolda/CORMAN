<?php

use Illuminate\Database\Seeder;
use App\Affiliation;

class AffiliationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

    	$affiliation1 = new Affiliation;
    	$affiliation1->name = 'University of Alabama';
      $affiliation1->link = 'https://www.ua.edu';
    	$affiliation1->save();

    	$affiliation2 = new Affiliation;
    	$affiliation2->name = 'University of California';
      $affiliation2->link = 'http://www.berkeley.edu';
    	$affiliation2->save();

    	$affiliation3 = new Affiliation;
    	$affiliation3->name = 'Yale University';
      $affiliation3->link = 'https://www.yale.edu';
    	$affiliation3->save();

    	$affiliation4 = new Affiliation;
    	$affiliation4->name = 'Massachusetts Institute of Technology';
      $affiliation4->link = 'http://web.mit.edu';
    	$affiliation4->save();

    	$affiliation5 = new Affiliation;
    	$affiliation5->name = 'Università degli Studi di Foggia';
      $affiliation5->link = 'https://www.unifg.it';
    	$affiliation5->save();

    	$affiliation6 = new Affiliation;
    	$affiliation6->name = 'Università Commerciale Bocconi Milano';
      $affiliation6->link = 'https://www.unibocconi.it/wps/wcm/connect/Bocconi/SitoPubblico_IT/Albero+di+navigazione/Home/';
    	$affiliation6->save();

    	$affiliation7 = new Affiliation;
    	$affiliation7->name = 'Università degli Studi di Bari';
      $affiliation7->link = 'http://www.uniba.it';
    	$affiliation7->save();

    	$affiliation8 = new Affiliation;
    	$affiliation8->name = 'Università degli Studi del Salento';
      $affiliation8->link = 'https://www.unisalento.it/web/guest/home_page';
    	$affiliation8->save();

    	$affiliation9 = new Affiliation;
    	$affiliation9->name = 'Università degli Studi di Catania';
      $affiliation9->link = 'http://www.unict.it';
    	$affiliation9->save();

    	$affiliation10 = new Affiliation;
    	$affiliation10->name = 'Università degli Studi di Roma Tor Vergata';
      $affiliation10->link = 'https://web.uniroma2.it';
    	$affiliation10->save();

    	$affiliation11 = new Affiliation;
    	$affiliation11->name = 'Università degli Studi di Parma';
      $affiliation11->link = 'http://www.unipr.it';
    	$affiliation11->save();

    	$affiliation12 = new Affiliation;
    	$affiliation12->name = 'University of Copenhagen';
      $affiliation12->link = 'http://www.ku.dk/english/';
    	$affiliation12->save();

    	$affiliation13 = new Affiliation;
    	$affiliation13->name = 'Harvard University';
      $affiliation13->link = 'https://www.harvard.edu';
    	$affiliation13->save();

    	$affiliation14 = new Affiliation;
    	$affiliation14->name = 'University of Cambridge';
      $affiliation14->link = 'https://www.cam.ac.uk';
    	$affiliation14->save();

    	$affiliation15 = new Affiliation;
    	$affiliation15->name = 'Università di Tokio';
      $affiliation15->link = 'http://www.thejapanesedreams.com/universita-imperiale-di-tokyo/';
    	$affiliation15->save();

    	$affiliation16 = new Affiliation;
    	$affiliation16->name = 'University of Toronto';
      $affiliation16->link = 'https://www.utoronto.ca';
    	$affiliation16->save();

    	$affiliation17 = new Affiliation;
    	$affiliation17->name = 'University of Munich';
       	$affiliation17->link = 'https://www.en.uni-muenchen.de/index.html';
    	$affiliation17->save();

    	$affiliation18 = new Affiliation;
    	$affiliation18->name = 'Utrecht University';
      $affiliation18->link = 'https://www.uu.nl/en';
    	$affiliation18->save();

    	$affiliation19 = new Affiliation;
    	$affiliation19->name = 'University of Zurich';
       	$affiliation19->link = 'https://www.uzh.ch/en.html';
    	$affiliation19->save();

    	$affiliation20 = new Affiliation;
    	$affiliation20->name = 'University of Bristol';
       	$affiliation20->link = 'http://www.bristol.ac.uk';
    	$affiliation20->save();

    	$affiliation21 = new Affiliation;
    	$affiliation21->name = 'Università di Ginevra';
       	$affiliation21->link = 'https://www.unige.ch';
    	$affiliation21->save();

    	$affiliation22 = new Affiliation;
    	$affiliation22->name = 'University of Helsinki';
       	$affiliation22->link = 'https://www.helsinki.fi/en';
    	$affiliation22->save();

    	$affiliation22 = new Affiliation;
    	$affiliation22->name = 'Osaka University';
       	$affiliation22->link = 'http://www.osaka-u.ac.jp/en';
    	$affiliation22->save();
    }

}
