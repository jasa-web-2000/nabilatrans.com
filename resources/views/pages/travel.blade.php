@extends('app')
@section('content')
    @php
        $asal = Str::title($travel[0]['name']);
        $asalId = $travel[0]['id'];
        $tujuan = Str::title($travel[1]['name']);
        $tujuanId = $travel[1]['id'];
    @endphp
    <x-default-baner :title="$page . ' PP Murah ' . date('Y')" :desc="$desc . '.'" />
    <x-layouts.article-section>
        {{-- left --}}
        <x-layouts.article-left class="col-span-full lg:col-span-6 lg:pr-24">
            {{-- @dd($travel) --}}
            <img src="{{ $thumbnail }}" alt="{{ $title }}" title="{{ $title }}">

            <p>Saat ini
                <strong>
                    <a
                        href="{{ route('jalur-rute-travel', [
                            'asal' => $asal,
                            'asalId' => $asalId,
                            'tujuan' => $tujuan,
                            'tujuanId' => $tujuanId,
                        ]) }}">
                        {{ $page }}</a>
                </strong>
                telah tersedia untuk membantu perjalanan transportasi anda kemanapun dan kapanpun dengan pelayanan door to
                door dan pulang pergi (pp). Pastinya harganya terjangkau dan bisa dinegosiasikan dengan admin kami.
            </p>


            <p>
                Travel dari {{ $asal }} saat ini sudah banyak bermunculan yang musiman. Mereka memberikan harga
                murah namun pelayanan sangat kurang baik. Jadi jangan sampai anda salah memilih agen travel. Pilih travel
                yang terpercaya, sudah punya website dan garasi atau loket resmi.
            </p>

            <p>Bagaimanapun, travel {{ $tujuan }} adalah layanan transportasi darat dengan jarak yang jauh dan durasi
                yang lama. Jadi anda juga harus memikirkan sisi kenyamanan. Anda bisa menentukan jasa transportasi yang akan
                anda pakai. Jadi kami tidak bisa memaksakan anda untuk menggunakan layanan travel.</p>

            <h2>{{ $title }}</h2>

            <p>Sedang mencari travel hari ini? Tenang saja akan membantu anda untuk bepergian dari {{ $asal }} ke
                {{ $tujuan }} maupun dari {{ $tujuan }} ke {{ $asal }}.</p>


        </x-layouts.article-left>



        {{-- right --}}
        <x-layouts.article-right>
            <x-booking :page="$page" />
        </x-layouts.article-right>


    </x-layouts.article-section>
@endsection
