<div class="w-full !mx-0 grid place-items-center __gradient py-20 relative">
    <div class="top-0 left-0 w-full opacity-[0.1] !bg-fixed h-full absolute !z-[2] !bg-cover"
        style="background: url({{ asset('img/bg-baner.png') }}) ">
    </div>
    <div class="text-center z-[3] px-2">
        <h1 class="!text-white mb-2">{{ config('app.name') }} Travel</h1>
        <p class="text-slate-200 mb-7 max-w-[450px] mx-auto">{{ config('app.name') }} fokus pada
            <span class="bg-white px-2 rounded-full text-sm text-slate-700">{{ tagline() }} Surabaya</span> dan
            <span class="bg-white px-2 rounded-full text-sm text-slate-700">se-Pulau Jawa Bali</span> dengan sistem door
            to door! Ayo pesan travel anda sekarang juga!
        </p>
    </div>
    <div class="w-full !z-[2] px-5">
        <div class="container mx-auto flex justify-center items-center {{-- last:[&>*]:hidden --}}">
            <x-travel-search />
            {{--
            <x-agen-search /> --}}
        </div>
    </div>
</div>
