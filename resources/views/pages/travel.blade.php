@extends('app')
@section('content')
    @php
        $asal = Str::title($travel[0]['name']);
        $asalId = $travel[0]['id'];
        $tujuan = Str::title($travel[1]['name']);
        $tujuanId = $travel[1]['id'];

        $postal_address = json_decode(postal_address(), true);
    @endphp

    @php

        $asalSlug = Str::slug($travel[0]['name']);
        $tujuanSlug = Str::slug($travel[1]['name']);
    @endphp

    <x-default-baner :title="$page . ' PP Murah ' . date('Y')" :desc="$desc . '.'" />
    <x-layouts.article-section>
        {{-- left --}}
        <x-layouts.article-left class="col-span-full lg:col-span-6 lg:pr-24">
            {{-- @dd($travel) --}}
            <img src="{{ $thumbnail }}" alt="{{ $title }}" title="{{ $title }}">

            <p>Saat ini
                <strong>
                    <a title="{{ $page }}"
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

            <h2>Penyedia {{ $page }}</h2>

            <p>Pada tahun {{ date('Y') }} telah banyak pilihan jasa travel reguler maupun carter. Namun ada satu travel
                reguler yang kami rekomendasikan, yaitu <a title="{{ env('APP_NAME') }}"
                    href="{{ route('beranda') }}">{{ env('APP_NAME') }}</a>.
                {{ env('APP_NAME') }} ini telah berpengalaman dalam bidang transportasi darat. {{ env('APP_NAME') }}
                merupakan jasa travel terbaik no. 1 di daerah Pulau Jawa dan Bali, terutama daerah
                {{ $postal_address['addressLocality'] }}.</p>

            <img src="{{ asset('img/logo.jpg') }}" alt="Logo {{ env('APP_NAME') }}" title="Logo {{ env('APP_NAME') }}">

            <p>Kami siap membantu perjalanan travel anda kapanpun dan kemanapun. Kami memiliki driver yang berpengalaman
                untuk rute-rute travel seluruh daerah di Pulau Jawa dan Bali. Mereka telah berlisensi dan telah mengikuti
                pelatihan yang sesuai dengan jasa travel. </p>

            <p>Selain
                <a target="_blank" title="{{ $page }}"
                    href="https://traveljawa.web.id/travel/dari-{{ $asalSlug }}/ke-{{ $tujuanSlug }}/{{ $asalId }}/{{ $tujuanId }}"><strong>{{ $page }}</strong>
                </a> {{ env('APP_NAME') }} juga memiliki banyak <a href="{{ route('arsip-travel') }}"
                    title="travel terbaik">travel terbaik</a>, berikut beberapa contohnya:
            </p>

            <ul>
                <li>
                    <a title="Travel {{ $tujuan }} {{ $asal }}"
                        href="{{ route('jalur-rute-travel', [
                            'asal' => Str::slug($tujuan),
                            'tujuan' => Str::slug($asal),
                            'asalId' => $tujuanId,
                            'tujuanId' => $asalId,
                        ]) }}">Travel
                        {{ $tujuan }} {{ $asal }}</a>
                </li>

                @foreach ($recommendation as $item)
                    <li>
                        <a
                            href="{{ route('jalur-rute-travel', ['asal' => Str::slug($loop->index < 5 ? $travel[0]['name'] : $travel[1]['name']), 'tujuan' => Str::slug($item['name']), 'asalId' => $loop->index < 5 ? $travel[0]['id'] : $travel[1]['id'], 'tujuanId' => $item['id']]) }}">{{ Str::title('Travel ' . ($loop->index < 5 ? $travel[0]['name'] : $travel[1]['name']) . ' ' . $item['name']) }}</a>
                    </li>
                @endforeach
            </ul>

            <img class="mt-5"
                src="{{ route('thumbnail-jalur-rute-travel', [
                    'asal' => Str::slug($travel[1]['name']),
                    'tujuan' => Str::slug($travel[0]['name']),
                    'asalId' => $travel[1]['id'],
                    'tujuanId' => $travel[0]['id'],
                ]) }}"
                alt="Travel {{ $tujuan }} {{ $asal }}"
                title="Travel {{ $tujuan }} {{ $asal }}">

            <h2>{{ $title }}</h2>

            <p>Sedang mencari travel hari ini? Tenang saja akan membantu anda untuk bepergian dari {{ $asal }} ke
                {{ $tujuan }} maupun dari {{ $tujuan }} ke {{ $asal }}. Tanpa perlu khawatir
                memikirkan
                harga, jadwal, biaya tol, dan rute travel. </p>


            <p>Bagi beberapa orang, jasa travel anda solusi perjalanan yang aman, cepat, dan fleksibel. Kenapa tidak? Anda
                bisa menjadwalkan perjalanan travel kapan saja dan tidak perlu menunggu. Kami langsung jemput dari rumah
                anda atau lokasi lain yang anda pilih.</p>

            <p>

                Untuk Hari {{ \Carbon\Carbon::now()->addDay()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}, telah
                dibuka pemesanan tiket travel untuk rute ini. Jika anda berminat, bisa langsung hubungi admin kami dan
                jadwalkan perjalanan travel sekarang juga!
            </p>

            <h3>Armada/Mobil Travel Yang Digunakan Lengkap</h3>

            <p>Kami adalah jasa <a target="_blank" title="Travel {{ $tujuan }} {{ $asal }}"
                    href="https://traveljawa.web.id/travel/dari-{{ $tujuanSlug }}/ke-{{ $asalSlug }}/{{ $tujuanId }}/{{ $asalId }}">
                    Travel {{ $tujuan }} {{ $asal }}
                </a> profesional, jadi kami telah memiliki banyak armada/mobil yang menunjang perjalanan
                travel. Tentunya semua mobil tersebut telah dilengkapi pengamanan dan fasilitas menarik seperti bagasi dan
                ac.</p>

            <p>Mobil travel juga dilengkapi dengan kursi yang nyaman dan bisa anda atur tingkat kemiringannya. Tidur di
                mobil jadi lebih nyaman. Jika anda ingin bepergian dengan jarak yang sangat jauh, sangat disarankan memilih
                jasa travel dari {{ env('APP_NAME') }}.</p>

            <p>Berikut daftar mobil/armada yang tersedia:</p>


            <ul>
                <li>Elf Giga</li>
                <li>Elf NLR (Macan)</li>
                <li>Avanza</li>
                <li>Xenia</li>
                <li>Mobilio</li>
                <li>Elf Short</li>
                <li>HiAce</li>
            </ul>


            <h3>Lokasi Titik Penjemputan dan Pengantaran</h3>

            <p>Sebetulnya, kami ini menawarkan jasa travel dengan sistem door to door. Door to door artinya anda akan
                dijemput langsung dari lokasi yang anda inginkan seperti rumah anda dan diantar langsung ke tempat yang anda
                inginkan juga. Jadi lebih fleksibel dan aman.</p>

            <p>Tidak perlu repot datang ke garasi kami untuk memulai keberangkatan, cukup dengan menunggu driver menjemput
                anda. Untuk layanan ini tidak dikenakan biaya tambahan.</p>

            <h3>Harga Tiket Travel</h3>

            <p>Untuk saat ini, harga travel mulai dari Rp100.000 - Rp250.000 tergantung rute yang anda pesan. Harga tidak
                selalu sama, pastikan untuk menghubungi admin sebelum melakukan pemesanan. Tidak hanya itu saja, anda juga
                bisa melakukan negosiasi harga travel kepada admin kami pada nomor {{ phone() }}.</p>

            <p>Harga diatas sudah include dengan berbagai bonus dan fasilitas menarik lainnya, seperti:</p>

            <ul>
                <li>Diskon tiket 10% untuk pemesanan hari ini</li>
                <li>Promo mingguan tersedia setiap Hari Minggu</li>
                <li>Free bagasi sebanyak 15 kg per orang</li>
                <li>Bonus snack dan air mineral 1 botol</li>
                <li>Bonus makan untuk beberapa rute travel</li>
                <li>Antar jemput langsung dari rumah</li>
                <li>Tiket tol penuh</li>
                <li>Biaya bensin</li>
                <li>Biaya parkir jika dibutuhkan</li>
                <li>Kursi dapat direbahkan</li>
            </ul>


            <h3>Cara Pemesanan Tiket Travel</h3>

            <p>Banyak sekali yang mengatasnamakan {{ env('APP_NAME') }} untuk mendapatkan penipuan. Bahkan ada yang
                menjadikannya sebagai modus penipuan. Harap terus berhati-hari untuk memesan travel. Kami hanya memiliki 1
                website dan 1 nomor telepon. Pesan {{ $page }} melalui whatsapp pada nomor <a
                    title="whatsapp{{ phone() }}" href="{{ whatsapp() }}" target="_blank"
                    rel="nofollow noreferrer">{{ phone() }}</a> atau anda
                bisa melakukan panggilan langsung.</p>

            <p>Selain itu, anda juga bisa melakukan pemesanan secara offline dengan cara mendatangi garasi kami. Kami
                memiliki garasi di setiap kota, namun garasi utama ada di <a title="{{ $postal_address['streetAddress'] }}"
                    href="{{ $postal_address['linkAddress'] }}" rel="nofollow noreferrer"
                    target="_blank">{{ $postal_address['streetAddress'] }}</a></p>


            <h2>Pertanyaan Yang Sering Ditanyakan Calon Penumpang</h2>

            <p>Setiap calon penumpang selalu memastikan sebelum melakukan pemesanan, mungkin anda juga menanyakan hal yang
                sama. Berikut pertanyaan dan jawabannya, semoga membantu.</p>

            <dl>
                <dt>{{ env('APP_NAME') }} Memiliki Garasi Dimana?</dt>
                <dd>Kami memiliki garasi di setiap kota, namun garasi utama ada di {{ $postal_address['addressLocality'] }}
                </dd>

                <dt>Berapa Harga {{ $page }}?</dt>
                <dd>Untuk harga travel bervariasi mulai dari Rp100.000 hingga Rp250.000 per orang. Silahkan lakukan
                    negosiasi kepada admin.
                </dd>

                <dt>Apakah Tersedia Promo dan Diskon?</dt>
                <dd>Tentu saja! Kami memberikan diskon s/d 10% untuk hari ini. Tidak hanya itu saja, terdapat promo menarik
                    setiap Hari Minggu.
                </dd>

                <dt>Apakah Harus Membayar DP?</dt>
                <dd>Pembayaran DP tidak wajib. Anda bisa membayar ketika sudah sampai di lokasi. Untuk pembayaran silahkan
                    koordinasi kepada admin kami.
                </dd>

                <dt>Dapat Fasilitas dan Bonus Apa Saja?</dt>
                <dd>Setiap layanan travel reguler dipastikan free bagasi, minuman, snack, dan mobil yang ber-ac. Untuk
                    beberapa rute disediakan makan gratis.</dd>
            </dl>

            <p>Travel reguler sangat cocok bagi anda yang ingin bepergian jarak jauh, baik itu sendiri maupun bersama
                keluarga atau rekan. Pelayanan selalu menyesuaikan kebutuhan para penumpang. Jadi, sangat disarankan
                memesan <strong>{{ $page }}</strong> bersama {{ env('APP_NAME') }}.</p>

        </x-layouts.article-left>



        {{-- right --}}
        <x-layouts.article-right>
            <x-booking :page="$page" />
        </x-layouts.article-right>


    </x-layouts.article-section>
@endsection
