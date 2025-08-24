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
        return 'admin@umj-trans.com';
    }
}

if (! function_exists('phone')) {
    function phone()
    {
        return '+62 831-7844-7080';
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
        return ["UMJ", "UMJ-T", env('APP_NAME')];
    }
}

if (! function_exists('tagline')) {
    function tagline()
    {
        return "Travel Madura Surabaya Terpercaya";
    }
}

if (! function_exists('postal_address')) {
    function postal_address()
    {
        return json_encode([
            'linkAdress' => "https://maps.app.goo.gl/xeUXBKm8Ax9nEAwNA",
            'googleMapIframe' => "https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3959.283810002657!2d113.38162587499814!3d-7.093064592910102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMDUnMzUuMCJTIDExM8KwMjMnMDMuMSJF!5e0!3m2!1sid!2sid!4v1754918890231!5m2!1sid!2sid",
            'streetAddress' => "W94M+QMG Campor, Kabupaten Pamekasan, Jawa Timur",
            'addressLocality' => "Kabupaten Pamekasan",
            'addressRegion' => "Jawa Timur",
            'addressCountry' => "ID",
            'postalCode' => "28464",
        ]);
    }
}
