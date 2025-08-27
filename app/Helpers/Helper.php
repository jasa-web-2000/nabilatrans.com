<?php


if (! function_exists('developer')) {
    function developer()
    {
        return [
            "name" => "Dion Zebua",
            "url" => "https://dionzebua.com"
        ];
    }
}

if (! function_exists('email')) {
    function email()
    {
        return 'admin@nabilatrans.com';
    }
}

if (! function_exists('phone')) {
    function phone()
    {
        return '+62 852-0396-7844';
    }
}

if (! function_exists('whatsapp')) {
    function whatsapp()
    {
        $cleaned_number = str_replace(['-', '+', ' '], '', phone());
        return "https://api.whatsapp.com/send/?phone=" . $cleaned_number . "&text=Halo+admin+" . request()->fullUrl() . "&type=phone_number&app_absent=0";
    }
}

if (! function_exists('alternate_name')) {
    function alternate_name()
    {
        return ["NT", env('APP_NAME'), env('APP_NAME') . " Tuban"];
    }
}

if (! function_exists('tagline')) {
    function tagline()
    {
        return "Travel Tuban";
    }
}

if (! function_exists('postal_address')) {
    function postal_address()
    {
        return json_encode([
            'linkAddress' => "https://maps.app.goo.gl/nGv9QgPRSRZ5k5RC8",
            'googleMapIframe' => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.3425548835623!2d112.09732971084685!3d-6.928191171470393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77965289c3658f%3A0x26fb5e360b8d1bbd!2sMushola%20Miftakhul%20Huda%20Tegalbang!5e0!3m2!1sid!2sid!4v1756197205992!5m2!1sid!2sid",
            'streetAddress' => "33CW+HV6, Sumbersari, Tegalbang, Kec. Palang, Kabupaten Tuban, Jawa Timur 62391, Indonesia",
            'addressLocality' => "Kabupaten Tuban",
            'addressRegion' => "Jawa Timur",
            'addressCountry' => "ID",
            'postalCode' => "62391",
        ]);
    }
}
