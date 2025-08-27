<div class="bg-slate-200">

    <div class="py-24 __container">
        <div class="">
            <x-heading title="Testimoni Pelanggan" desc1="Pendapat Mereka Tentang Layanan Kami"
                desc2="Apa saja ulasan mereka setelah menggunakan layanan dari kami?" />
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">

                <div
                    class="mx-auto max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl custom-container flex flex-col items-center justify-center text-center mb-10 mt-16">
                    <div class="grid gap-10 md:grid-cols-2 xl:grid-cols-3">
                        <x-testimoni
                            text="Rekomendasi {{ tagline() }} Surabaya bersama {{ env('APP_NAME') }}, perjalanan terasa <mark class='px-2 mx-1 text-mine bg-yellow-100 rounded-md ring-yellow-200 ring-2'>nyaman</mark> dan menyenangkan! Armada Elf Long-nya bersih, AC bekerja dengan baik, dan pengemudinya sangat berpengalaman. Sepanjang jalan, saya bisa bersantai tanpa gangguan atau rasa lelah. Pelayanan seperti ini bikin saya ingin memesan lagi di lain waktu."
                            name="Danang" job="Pengusaha" img="{{ asset('img/testimonial/gal1.webp') }}"
                            className="xl:col-span-1 md:col-span-2" />
                        <x-testimoni
                            text="Layanan travel ini benar-benar bisa diandalkan! Saya memesan untuk mengantar orang tua ke bandara jelang keberangkatan umroh. Kendaraannya bersih, sopirnya sopan dan datang tepat waktu. Kami sekeluarga <mark class='px-2 mx-1 text-mine bg-yellow-100 rounded-md ring-yellow-200 ring-2'>merasa tenang</mark> karena perjalanan berlangsung mulus tanpa terburu-buru. Terima kasih atas pelayanan yang luar biasa!"
                            name="Ahmad Fauzi" job="Agen Travel Umroh" img="{{ asset('img/testimonial/gal2.webp') }}" />
                        <x-testimoni
                            text="Saya menggunakan jasa travel ini untuk pulang ke Tuban dari Bali saat Lebaran, dan alhamdulillah semuanya berjalan lancar. Sopirnya <mark class='px-2 mx-1 text-mine bg-yellow-100 rounded-md ring-yellow-200 ring-2'>ramah</mark>, mobil yang digunakan <mark class='px-2 mx-1 text-mine bg-yellow-100 rounded-md ring-yellow-200 ring-2'>bersih</mark> dan <mark class='px-2 mx-1 text-mine bg-yellow-100 rounded-md ring-yellow-200 ring-2'>adem</mark>, bikin perjalanan jadi nyaman dan nggak terasa melelahkan. Orang tua saya juga ikut lega karena saya tiba dengan selamat dan tepat waktu. Terima kasih atas pelayanannya!"
                            name="Dewi Lestari" job="Mahasiswi" img="{{ asset('img/testimonial/gal3.webp') }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
