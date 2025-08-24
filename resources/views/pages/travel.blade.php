@extends('app')
@section('content')
    <x-default-baner :title="$page . ' PP Murah ' . date('Y')" :desc="$desc . '.'" />
    <x-layouts.article-section>
        {{-- left --}}
        <x-layouts.article-left class="col-span-full lg:col-span-6 lg:pr-24">
            {{-- @dd($travel) --}}
            <img src="{{ $thumbnail }}" alt="{{ $title }}" title="{{ $title }}">

            <p>
                <a title="{{ $page }}"
                    href="{{ route('jalur-rute-travel', [
                        'asal' => Str::slug($travel[0]['name']),
                        'asalId' => $travel[0]['id'],
                        'tujuan' => Str::slug($travel[1]['name']),
                        'tujuanId' => $travel[1]['id'],
                    ]) }}"><strong>{{ $page }}</strong>
                </a> adalah salah satu layanan transportasi darat yang sangat diminati
                oleh banyak orang di daerah Jawa Timur, terutama daerah {{ Str::title($travel[0]['name']) }} maupun
                {{ Str::title($travel[1]['name']) }}. Bahkan kami bisa mengantarkan anda sampai
                ke luar provinsi jika anda memesan travel carter. Pelayanan lebih
                eksklusif dibanding travel reguler.
            </p>


            <p>
                Salah satu alasan orang menggunakan jasa travel adalah layanan yang
                responsif. Travel sangat membantu bagi orang yang bepergian
                mendadak, anti ribet, dan yang mau hemat biaya. Tak perlu repot
                karena anda akan diantar jemput langsung sesuai titik, dengan arti
                lain kami akan menjemput anda langsung dari rumah anda.
            </p>

            <h2>Info {{ $page }} Untuk Hari Ini</h2>

            <p>
                Jasa travel ini apa sih? Apakah dijamin aman? Jika teman-teman ingin
                yang aman, sangat disarankan memesan pada situs ini. Travel dilayani
                oleh {{ env('APP_NAME') }} dan kawan-kawan sejalur. Jasa terbaik
                untuk Travel {{ Str::title($travel[0]['name']) }} maupun Travel {{ Str::title($travel[1]['name']) }}
                Pastinya
                semua profesional, resmi, dan telah dilengkapi dengan surat-surat.
            </p>

            <img class="mt-5" src="{{ asset('img/umj.jpg') }}" alt="{{ env('APP_NAME') }}" title="{{ env('APP_NAME') }}">


            <p>
                Travel yang satu ini adalah layanan perjalanan darat menggunakan
                mobil. Sistem yang digunakan adalah door to door. Namun karena tipe
                reguler, jika anda penumpang lain, maka mobil akan menjemputnya
                juga. Otomatis anda akan ikut juga menjemputnya.
            </p>

            <p>
                Pada Hari {{ \Carbon\Carbon::now()->addDay()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}, layanan
                travel untuk rute ini telah siap jalan.
                Dengan detail sebagai berikut:
            </p>

            <h3>Harga Murah dan Didiskon 10%</h3>

            <p>
                Harga {{ $page }} biasanya berbeda-beda menyesuaikan titik antar dan
                titik jemput. Namun jangan khawatir dijamin harganya murah dan
                terjangkau. <a href="{{ route('beranda') }}" title="{{ route('beranda') }}">{{ env('APP_NAME') }}</a>
                menawarkan jasa travel dengan harga mulai dari Rp100.000 hingga
                Rp250.000 per tiket. Tentunya ini sudah termasuk murah untuk layanan
                sekelas travel door to door.
            </p>


            @php
                $address = json_decode(postal_address(), true);
            @endphp
            <p>
                Jika anda datang ke garasi, maka anda akan mendapatkan potongan
                harga sebesar 10% dari harga total. Maka dari itu sangat kami
                sarankan memesan tiket langsung ke garasi kami yang ada di setiap
                kota. Namun garasi utama ada di
                <Link href={{ $address['linkAdress'] }} title="alamat" target="_blank" rel="nofollow noreferrer">
                {{ $address['streetAddress'] }}
                </Link>
                .
            </p>



            <h3>Pilihan Mobil Travel Yang Digunakan Lengkap</h3>

            <p>
                {{ env('APP_NAME') }} memiliki banyak tipe mobil atau armada yang
                tersedia. Semua armada sangat lengkap dan telah dilengkapi dengan
                ac, audio, dan tv. Berikut beberapa mobil untuk travel reguler:
            </p>
            <ul>
                <li>Toyota Hiace</li>
                <li>Isuzu Elf</li>
                <li>Toyota Avanza</li>
                <li>Daihatsu Xenia</li>
                <li>Toyota Innova</li>
                <li>Mitsubishi L300</li>
                <li>Suzuki APV</li>
                <li>Hyundai H-1</li>
                <li>Mercedes-Benz Sprinter</li>
            </ul>

            <p>Untuk carter berikut pilihan mobilnya:</p>

            <ul>
                <li>Nissan Evalia</li>
                <li>Kia Pregio</li>
                <li>Mazda Biante</li>
                <li>Honda Mobilio</li>
                <li>Wuling Confero</li>
                <li>Wuling Cortez</li>
                <li>Toyota Alphard</li>
                <li>Hyundai Staria</li>
                <li>DFSK Glory</li>
            </ul>

            <p>
                Perlu anda ingin, bahwa anda tidak bisa memilih mobil jika
                menggunakan travel dan satu tiket. Minimal pemesanan 5 tiket anda
                bisa pilih unit. Namun untuk carter bebas saja.
            </p>

            <h3>Jadwal Keberangkatan Travel</h3>

            <p>
                Seperti yang sudah kami katakan sebelumnya, setiap hari kami sudah
                mulai beroperasi, terutama pada hari ini. {{ $page }} akan jalan setiap
                jam selama 24 jam. Jadi jangan khawatir anda akan kami layani
                kapanpun.
            </p>


            <p>
                Meskipun 24 jam, anda sangat disarankan memesan tiket pada jauh-jauh
                hari untuk mengantisipasi batalnya keberangkatan. Biasanya
                disebabkan oleh beberapa masalah seperti kondisi unit atau driver
                yang kurang fit.
            </p>

            <h3>Bonus Makan dan Minum</h3>

            <p>
                Bonus makan sekali dalam perjalanan dan bonus air mineral 1 botol.
                Untuk fasilitas yang satu ini, hanya berlaku untuk rute tertentu
                saja. Namun jika memesan carter pasti dapat bonus makan. Untuk itu
                silahkan konsultasikan kepada admin.
            </p>

            <h2>Cara Pesan Tiket {{ $page }}</h2>

            <p>
                Sebetulnya pemesanan tiket ada 2 cara, yaitu secara online melalui
                whatsapp pada nomor
                <a href={{ whatsapp() }} title="pesan via whatsapp" target="_blank" rel="nofollow noreferrer">
                    {{ phone() }}
                </a>
                atau secara offline dengan datang ke garasi kami. Cuman sangat
                disarankan untuk memesan secara offline karena tidak akan tertipu.
                Jika online, ada kemungkinan anda memesan tiket pada orang yang
                salah yang mengatasnamakan {{ env('APP_NAME') }}.
            </p>

            <p>Berikut alur pemesanan tiket travel:</p>


            <ul>
                <li>
                    Baik online maupun offline, anda akan diberikan formulir untuk
                    mengisi data penumpang dan titik antar jemput
                </li>
                <li>
                    Diskusikan kepada admin jika anda memiliki barang bawaan yang
                    besar atau melebihi 15 kg
                </li>
                <li>Lalu negosiasi harga jika anda merasa tidak cukup</li>
                <li>
                    Jika sudah selesai, anda harus simpan formulir tersebut dan
                    tujukan kepada driver ketika mau berangkat
                </li>
                <li>Bayar biaya ketika anda tiba di lokasi tujuan</li>
            </ul>

            <h2>Cara Membatalkan atau Merubah Jadwal</h2>

            <p>
                Untuk membatalkan dan merubah jadwal tidak bisa sembarangan. Ada
                berbagai prosedur dan syarat yang anda lalui. Silahkan hubungi admin
                untuk lebih lanjut. Disarankan untuk membatalkan atau merubah jadwal
                selama 1 hari sebelum keberangkatan.
            </p>

            <h2>Proses Pengembalian Uang</h2>

            <p>
                Jika pembatalan keberangkatan sudah diterima admin, maka anda bisa
                mendapatkan pengembalian tiket. Itupun jika anda sudah bayar. Karena
                kami biasanya hanya menerima pembayaran ketika sudah tiba di lokasi
                tujuan.
            </p>

            <h2>Rekomendasi Rute Travel Lainnya</h2>

            <p>
                Tidak hanya rute Travel {{ Str::title($travel[1]['name']) }} {{ Str::title($travel[0]['name']) }} saja
                yang kami layani. Kami juga
                melayani
                <a href="{{ route('arsip-travel') }}" title="rute travel">
                    rute travel
                </a>
                lengkap di seluruh Jawa Timur. Terutama di daerah {{ Str::title($travel[0]['name']) }}
                maupun di {{ Str::title($travel[1]['name']) }}. Berikut Rekomendasi rute travel yang
                mungkin cocok untuk anda:
            </p>


            @foreach ($recommendation as $item)
                <li>
                    <a
                        href="{{ route('jalur-rute-travel', ['asal' => Str::slug($loop->index < 5 ? $travel[0]['name'] : $travel[1]['name']), 'tujuan' => Str::slug($item['name']), 'asalId' => $loop->index < 5 ? $travel[0]['id'] : $travel[1]['id'], 'tujuanId' => $item['id']]) }}">{{ Str::title('Travel ' . ($loop->index < 5 ? $travel[0]['name'] : $travel[1]['name']) . ' ' . $item['name']) }}</a>
                </li>
            @endforeach

            <img class="mt-5"
                src="{{ route('thumbnail-jalur-rute-travel', ['asal' => Str::slug($travel[1]['name']), 'tujuan' => Str::slug($travel[0]['name']), 'asalId' => $travel[1]['id'], 'tujuanId' => $travel[0]['id']]) }}"
                alt="Travel {{ $travel[1]['name'] }} {{ $travel[0]['name'] }}"
                title="Travel {{ $travel[1]['name'] }} {{ $travel[0]['name'] }}">


            <p>
                Demikian info travel untuk hari ini. Jangan sampai salah memilih
                penyedia jasa travel, karena anda akan ditipu atau data-data anda
                disalah gunakanan. Jika ingin bepergian segera, gunakanlah layanan <strong>{{ $title }}</strong>
                dari
                <a href="{{ route('beranda') }}" title={{ env('APP_NAME') }}>
                    {{ env('APP_NAME') }}
                </a>
            </p>



        </x-layouts.article-left>



        {{-- right --}}
        <x-layouts.article-right>
            <x-booking :page="$page" />
        </x-layouts.article-right>


    </x-layouts.article-section>
@endsection
