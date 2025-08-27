<div>
    <div
        class="grid grid-cols-1 min-[400px]:grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-y-7 gap-x-5">

        @foreach ($featured as $item)
            @php
                $title = Str::title('TRAVEL ' . $item[0]['name'] . ' ' . $item[1]['name']);
            @endphp
            <div class="rounded-lg overflow-hidden h-full">
                <div class="overflow-hidden w-full h-auto block">

                    <img width="160" height="90" loading="lazy" title="{{ $title }}" loading="lazy"
                        src="{{ route('thumbnail-jalur-rute-travel', ['asal' => Str::slug($item[0]['name']), 'tujuan' => Str::slug($item[1]['name']), 'asalId' => $item[0]['id'], 'tujuanId' => $item[1]['id']]) }}"
                        class="border-4 w-full h-auto aspect-video border-b-0 rounded-lg rounded-b-none hover:scale-110 transition-all duration-300"
                        alt="{{ $title }}">

                </div>
                <div class="p-5 bg-white h-full">
                    <h3 class="mt-0 text-base font-semibold !leading-normal mb-3">{{ $title }}</h3>
                    <p class="text-[15px]">Pesan {{ $title }} untuk hari ini dan dapatkan promo menarik</p>
                    <a href="{{ route('jalur-rute-travel', ['asal' => Str::slug($item[0]['name']), 'tujuan' => Str::slug($item[1]['name']), 'asalId' => $item[0]['id'], 'tujuanId' => $item[1]['id']]) }}"
                        title="{{ $title }}" target="__blank" class="underline text-[15px] opacity-80">Baca
                        selengkapnya...</a>
                    <a title="Pesan {{ $title }}" target="_blank" rel="nofollow noreferrer"
                        href="{{ whatsapp() }}" target="__blank"
                        class="mt-4 rounded-lg hover:bg-blue-500 bg-blue-600 text-slate-100 px-5 py-2 text-sm line-clamp-2 !leading-5 text-center font-bold">Pesan
                        Travel</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
