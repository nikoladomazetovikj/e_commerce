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

    public static function getAdress()
    {
        return DB::table('site_details')->value('address');
    }

    public static function getPhone()
    {
        return DB::table('site_details')->value('phone_number');
    }

    public static function getFacebook()
    {
        return DB::table('site_details')->value('facebook');
    }

    public static function getInstagram()
    {
        return DB::table('site_details')->value('instagram');
    }

    public static function getTwitter()
    {
        return DB::table('site_details')->value('twitter');
    }

}
