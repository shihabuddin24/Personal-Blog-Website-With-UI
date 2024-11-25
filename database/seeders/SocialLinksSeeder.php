<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SocialLink::create(['platform'=>'Facebook', 'url'=>'https://www.facebook.com/ShihabUddin005?mibextid=ZbWKwL']);
        SocialLink::create(['platform'=>'Instagram', 'url'=>'https://www.instagram.com/shihabuddin5544/profilecard/?igsh=dmN5bW03N3hpMjIw']);
        SocialLink::create(['platform'=>'Twitter', 'url'=>'https://x.com/Shihab5544?t=4BBZmEwjsaffZbl76qskBA&s=09']);
        SocialLink::create(['platform'=>'Youtube', 'url'=>'https://www.youtube.com/@shihabuddin1856']);
    }
}
