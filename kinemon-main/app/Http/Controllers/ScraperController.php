<?php

namespace App\Http\Controllers;
use App\Models\Event;
//burda mısn cideen

use Nesk\Puphpeteer\Puppeteer;
use Illuminate\Http\Request;
class ScraperController extends Controller
{
  public function index() {
    $puppeteer = new Puppeteer();
            $browser = $puppeteer->launch([
                'args' => [
                    '--no-sandbox',
                    '--disable-setuid-sandbox',
                ]
            ]);

            $page = $browser->newPage();

            $device = [
                "name" => 'iPhone 13 Pro',
                "userAgent" =>
                    'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.75 Safari/537.36',
                "viewport" => [
                    "width" => 1440,
                    "height" => 768,
                    "deviceScaleFactor" => 3,
                    "isMobile" => false,
                    "hasTouch" => false,
                    "isLandscape" => true,
                ]
            ];

            $page->emulate($device);
            $page->goto('https://kultur.istanbul/etkinlikler');


           $page->waitForSelector('div.wpem-event-title > h3');
           //burası başlıklar
           $titles =$page->querySelectorAll('div.wpem-event-title > h3');

           $myTitles = [ ];

           foreach ($titles as $title){
               $myTitles [] = $title->getProperty('innerText')->jsonValue();
           }

           //başlık bitiş

           //linkler wpem-event-action-url

           $links =$page->querySelectorAll('div.wpem-event-details > a');

           $myLinks = [ ];

           foreach ($links as $link){
               $myLinks [] = $link->getProperty('href')->jsonValue();
           }


          //burası tarihler
           $dates =$page->querySelectorAll('span.wpem-event-date-time-text');

           $myDates = [ ];

           foreach ($dates as $date){
               $myDates [] = $date->getProperty('innerText')->jsonValue();
           }

           //tarşhler bitiş

           //yerler
            $places =$page->querySelectorAll('span.wpem-event-location-text');

            $myPlaces = [ ];

            foreach ($places as $place){
              $myPlaces [] = $place->getProperty('innerText')->jsonValue();
            }

            //yukarısı scraep edilen datalar için

            // aiağısı db deki datalar için




            $events = Event::query()
                ->whereHas('invites', function($q) {
                    $q->where('invitee_id', auth()->id());
                })
                ->orWhere('created_by_id', auth()->id())
                ->orderByDesc('created_at',)
                ->get();


            return view('scraper',compact('myTitles','myDates','myPlaces','events','myLinks'));

  }
}
