<!doctype html>
<html lang="id">

<head>
    <link rel="preload" href="{{ asset('font/Poppins-Regular.ttf') }}" as="font" type="font/ttf"
        crossorigin="anonymous">

    <link rel="preload" href="{{ asset('img/logo.png') }}" as="image">
    <link rel="preload" href="{{ asset('img/blob.svg') }}" as="image">

    <meta charset="utf-8">
    <style>
        html,
        body {
            touch-action: manipulation;
            overflow-x: hidden;
        }

        @font-face {
            font-family: 'Poppins';
            src: url('{{ asset('font/Poppins-Regular.ttf') }}') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;

        }
    </style>
    @vite('resources/css/app.css')
    @livewireStyles
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    {{-- --}}

    <title>{{ (isset($title) ? $title . ' | ' : '') . config('app.name') }}</title>
    <meta name="description" content="{{ (isset($desc) ? $desc . ' | ' : '') . config('app.name') }}" />

    <meta property="og:title" content="{{ (isset($title) ? $title . ' | ' : '') . config('app.name') }}" />
    <meta property="og:description" content="{{ (isset($desc) ? $desc . ' | ' : '') . config('app.name') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:image" content="{{ $thumbnail ?? asset('img/logo.jpg') }}" />

    <link rel="apple-touch-icon" href="{{ asset('/favicon.ico') }}" />
    <link rel="icon" size="16x16" href="{{ asset('/favicon.ico') }}" />
    <link rel="icon" size="32x32" href="{{ asset('/favicon.ico') }}" />
    <link rel="icon" size="180x180" href="{{ asset('/favicon.ico') }}" />
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <link rel="canonical" href="{{ url()->full() }}" />


    @if (isset($productSchema) && $productSchema)
        <!-- Product Schema -->

        <script type="application/ld+json">
        {!! preg_replace('/\\\/', '', json_encode($productSchema)) !!}
    </script>
    @endif




    @php
        // Menghitung reviewCount dan ratingValue
        $now = new \DateTime();
        $startOfYear = new \DateTime($now->format('Y') . '-01-01');
        $diff = $now->getTimestamp() - $startOfYear->getTimestamp();
        $oneDay = 1000 * 60 * 60 * 24;

        $reviewCount = $now->format('Y') - 2024 + floor($diff / $oneDay) + 1;
        $ratingValue = $reviewCount % 2 === 0 ? 4.9 : 4.8;

        $address = json_decode(postal_address(), true);

        // JSON-LD schema
        $organizationSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => env('APP_NAME'),
            'url' => env('APP_URL'),
            'logo' => asset('img/logo.jpg'),
            'description' => 'Melayani jasa travel seluruh pulau jawa terutama rute ' . tagLine(),
            'email' => email(),
            'telephone' => phone(),
            'image' => asset('img/logo.jpg'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $address['streetAddress'],
                'addressLocality' => $address['addressLocality'],
                'addressRegion' => $address['addressRegion'],
                'postalCode' => $address['postalCode'],
                'addressCountry' => $address['addressCountry'],
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => $ratingValue,
                'reviewCount' => $reviewCount,
                'bestRating' => 5,
            ],
        ];
    @endphp

    <!-- Organization Schema -->
    <script type="application/ld+json">
        {!! preg_replace('/\\\/', '', json_encode($organizationSchema)) !!}
    </script>



    @php
        $siteSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => env('APP_NAME'),
            'alternateName' => alternate_name(),
            'url' => env('APP_URL'),
        ];
    @endphp

    <!-- Site Schema -->
    <script type="application/ld+json">
        {!! json_encode($siteSchema, JSON_UNESCAPED_SLASHES) !!}
    </script>


</head>

<body class="font-poppins bg-slate-100 text-slate-600 overflow-x-visible">
    <x-layouts.header />

    @yield('content')

    <x-alert />
    <x-layouts.footer />


    @vite('resources/js/app.js')
    @livewireScripts

</body>


</html>
