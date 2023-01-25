<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

/*
   |--------------------------------------------------------------------------
   | SiteData Helper
   |--------------------------------------------------------------------------
   |
   | This helper class should provide the site details such as
   | links to the social media, addresses, phones
   | Instead of doing queries in the controllers we can easily
   | access all the necessary data in every view
   */

class SiteData
{
    public static function getData()
    {
       return DB::table('site_details')->get();
    }

    // TODO: add more functions
}
