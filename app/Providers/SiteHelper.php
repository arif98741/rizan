<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SiteHelper extends ServiceProvider
{

    /**
     * Ping to google search console after generating xml as new file
     * return void
     */
    public static function webPing()
    {
        $url = 'https://www.google.com/ping?sitemap=https://treatlover.com/public/uploads/sitemap/sitemap_sitemap.xml';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch); // Close the connection
    }

}
