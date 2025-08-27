@php
    $address = json_decode(postal_address(), true);
    $menu = [
        [phone(), whatsapp()],
        [$address['addressLocality'], $address['linkAddress']],
        // [email(), 'mailto:' . email()],
    ];

@endphp

@foreach ($menu as $key => $item)
    <li>
        <a target="_blank" rel="nofollow noreferrer" href="{{ $item[1] ?? route(Str::slug($item[0])) }}"
            class="whitespace-nowrap hover:text-blue-50">{{ $item[0] }}</a>
    </li>
@endforeach
