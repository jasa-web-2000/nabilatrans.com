<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class LandingPageController extends Controller
{
    public $province;
    public $city;
    public $district;
    public $featured;
    public $agent;

    public function __construct()
    {

        $this->province = ProvinceController::all()
            ->whereIn("id", ['31', '51'])
            ->values();

        $cityOrder = [
            "3580",
            "3578",
            "3528",
            "3529",
            "3526",
            "3527",
            "3576",
            "3573",
            "3514",
            "3571"
        ];

        $this->city = CityController::all()
            ->whereIn("id", $cityOrder)
            ->sortBy(function ($item) use ($cityOrder) {
                return array_search($item['id'], $cityOrder);
            })
            ->values();

        $this->district = DistrictController::all()
            ->whereIn("id", ["3515110", "3515131"])
            ->values();

        $this->featured = [
            $this->city[0],       // 3580 -> origin
            $this->city[1],       // 3578 -> destination

            $this->city[2],       // 3528 -> origin
            $this->city[1],       // 3578 -> destination

            $this->city[3],       // 3529 -> origin
            $this->city[1],       // 3578 -> destination

            $this->city[4],       // 3526 -> origin
            $this->city[1],       // 3578 -> destination

            $this->city[5],       // 3527 -> origin
            $this->city[1],       // 3578 -> destination

            $this->city[1],       // 3578 -> destination
            $this->city[0],       // 3580 -> origin

            $this->city[6],       // 3576 -> origin
            $this->city[0],       // 3580 -> destination

            $this->city[0],       // 3580 -> origin
            $this->district[0],   // 3515110 -> destination

            $this->city[7],       // 3573 -> origin
            $this->city[0],       // 3580 -> destination

            $this->city[0],       // 3580 -> origin
            $this->district[1],   // 3515131 -> destination

            $this->city[8],       // 3514 -> origin
            $this->city[0],       // 3580 -> destination

            $this->city[0],       // 3580 -> origin
            $this->city[9],       // 3571 -> destination
        ];


        $this->agent = $this->province->merge($this->city)->merge($this->district);
    }


    public function beranda()
    {

        return view('pages.home', [
            'title' => tagline(),
            'desc' => tagline() . ' dan seluruh Jawa Timur dengan harga murah dan terjangkau',
            'featured' => array_chunk($this->featured, 2),
            // 'agent' => $this->province->merge($this->city),
        ]);
    }

    public function kontak()
    {
        return view('pages.kontak', [
            'title' => Str::title('Hubungi Kami Untuk Pemesanan Travel'),
            'desc' => Str::title('Pesan travel mudah dan cepat! Layanan antar jemput, carter drop/pp, dan jadwal fleksibel. Hubungi kami sekarang juga.'),
        ]);
    }

    public function galeri()
    {
        return view('pages.galeri', [
            'title' => Str::title('Galeri Mobil Travel'),
            'desc' => Str::title('Pesan travel mudah dan cepat! Layanan antar jemput, carter drop/pp, dan jadwal fleksibel. Hubungi kami sekarang juga.'),
        ]);
    }

    public function cariTravel(Request $request)
    {
        $validation = $request->validate([
            "asal_provinsi" => "required|integer",
            "asal_kotakab" => "nullable|integer",
            "asal_kecamatan" => "nullable|integer",

            "tujuan_provinsi" => "required|integer",
            "tujuan_kotakab" => "nullable|integer",
            "tujuan_kecamatan" => "nullable|integer",
        ]);

        $dataRes = [
            Str::slug(DistrictController::all()
                ->where('id', $request->asal_kecamatan)->first()['name'] ??

                CityController::all()->where('id', $request->asal_kotakab)->first()['name'] ??

                ProvinceController::all()->where('id', $request->asal_provinsi)->first()['name']) ?? NULL,

            Str::slug(DistrictController::all()
                ->where('id', $request->tujuan_kecamatan)->first()['name'] ??
                CityController::all()
                    ->where('id', $request->tujuan_kotakab)->first()['name'] ??
                ProvinceController::all()
                    ->where('id', $request->tujuan_provinsi)->first()['name']) ?? NULL,

            $request->asal_kecamatan ?? $request->asal_kotakab ?? $request->asal_provinsi ?? 0,

            $request->tujuan_kecamatan ?? $request->tujuan_kotakab ?? $request->tujuan_provinsi ?? 0,
        ];

        return redirect()->route('jalur-rute-travel', $dataRes);
    }

    public function cariAgen(Request $request)
    {
        $validation = $request->validate([
            "asal_provinsi" => "required|integer",
            "asal_kotakab" => "nullable|integer",
            "asal_kecamatan" => "nullable|integer",
        ]);

        $dataRes = [
            Str::slug(DistrictController::all()->where('id', $request->asal_kecamatan)->first()->name ??
                CityController::all()
                ->where('id', $request->asal_kotakab)->first()->name ??
                ProvinceController::all()
                ->where('id', $request->asal_provinsi)->first()->name) ?? NULL,

            $request->asal_kecamatan ?? $request->asal_kotakab ?? $request->asal_provinsi ?? 0,
        ];

        return redirect()->route('agen-travel', $dataRes);
    }

    public function jalurRuteTravel($asal, $tujuan, $asalId, $tujuanId)
    {
        $asalRes = $this->checkId($asalId);
        $tujuanRes = $this->checkId($tujuanId);

        if ((Str::slug($asalRes['name'] ?? '') != $asal || Str::slug($tujuanRes['name'] ?? '') != $tujuan) || $asalId == $tujuanId) {
            abort(404);
        }

        if (Route::currentRouteName() === 'thumbnail-jalur-rute-travel') {
            return ThumbnailController::generateThumbnail(["TRAVEL", $asalRes['name'], $tujuanRes['name']]);
        }

        $page = Str::title("Travel $asalRes[name] $tujuanRes[name]");

        $province = ProvinceController::all();
        // ->whereNotIn('id', [$asalId, $tujuanId])->random(1);
        $city = CityController::all()
            ->whereNotIn('id', [$asalId, $tujuanId])->random(8);
        $district = DistrictController::all()
            ->whereNotIn('id', [$asalId, $tujuanId])->random(12);

        $recommendation = $province->merge($city)->merge($district)->shuffle()->take(9);
        $recommendation->splice(5, 0, [$asalRes]);

        $description = Str::title("$page terbaik dengan berbagai fasilitas menarik mulai dari bonus makan, door to door, via tol, dan jalan 24 jam");

        $thumbnail = route('thumbnail-jalur-rute-travel', ['asal' => Str::slug($asalRes['name']), 'tujuan' => Str::slug($tujuanRes['name']), 'asalId' => $asalRes['id'], 'tujuanId' => $tujuanRes['id']]);

        return view('pages.travel', [
            'page' => $page,
            'title' => Str::title("$page Terpercaya " . date('Y')),
            'desc' => $description,
            'travel' => [$asalRes, $tujuanRes],
            'recommendation' => $recommendation,
            'thumbnail' => $thumbnail,
            'productSchema' => $this->generateProductSchema([
                'name' => $page,
                'description' => $description,
                'image' => $thumbnail,
            ])
        ]);
    }

    public function agenTravel($asal, $asalId)
    {
        $asalRes = $this->checkId($asalId);
        if (Str::slug($asalRes['name']) != $asal) {
            abort(404);
        }

        if (Route::currentRouteName() === 'thumbnail-agen-travel') {
            return ThumbnailController::generateThumbnail(["AGEN TRAVEL", $asalRes['name']]);
        }

        $page = Str::title("Agen Travel $asalRes[name]");

        return view('pages.agen', [
            'page' => $page,
            'title' => Str::title("7 $page Murah " . date('Y')),
            'desc' => Str::title("7 Rekomendasi $page Profesional Terbaik No. 1 di tahun " . date('Y') . " dengan harga murah"),
            'agent' => $asalRes,
            'thumbnail' => route('thumbnail-agen-travel', ['asal' => Str::slug($asalRes['name']), 'asalId' => $asalRes['id']]),
        ]);
    }


    public function checkId($id)
    {
        // $name = Str::slug($name);
        if ($id <= 92) {
            $res = ProvinceController::all()
                ->where('id', $id)->first();
        } elseif ($id <= 110101) {
            $res = CityController::all()
                ->where('id', $id)->first();
        } else {
            $res = DistrictController::all()
                ->where('id', $id)->first();
        }
        return $res;
    }

    public function arsipTravel()
    {
        return view('pages.arsip-travel', [
            'title' => "Arsip Travel Termurah " . date('Y'),
            'desc' => config('app.name') . " Menawarkan Travel Termurah dan Terbaik No. 1 di Pulau Jawa dan Bali",
            'featured' => array_chunk($this->featured, 2),
        ]);
    }

    public function arsipAgen()
    {
        return view('pages.arsip-agen', [
            'title' => "Arsip Agen Travel Termurah " . date('Y'),
            'desc' => "Arsip Agen Travel Termurah dan Terbaik No. 1 di Indonesia",
            'agent' => $this->province->merge($this->city),
        ]);
    }


    private function generateProductSchema($product)
    {
        $now = new \DateTime();
        $startOfYear = new \DateTime($now->format('Y') . '-01-01');
        $diff = $now->getTimestamp() - $startOfYear->getTimestamp();
        $oneDay = 1000 * 60 * 60 * 24;

        $reviewCount = $now->format('Y') - 2024 + floor($diff / $oneDay) + 1;
        $ratingValue = $reviewCount % 2 === 0 ? 4.9 : 4.8;

        return [
            "@context" => "https://schema.org/",
            "@type" => "Product",
            "name" => $product['name'],
            "description" => $product['description'],
            "image" => asset($product['image']),
            "brand" => [
                "@type" => "Brand",
                "name" => config('app.name'),
            ],
            "offers" => [
                "@type" => "AggregateOffer",
                "lowPrice" => 100000,
                "highPrice" => 250000,
                "priceCurrency" => "IDR",
                "offerCount" => 10,
            ],
            "review" => [
                "@type" => "Review",
                "positiveNotes" => [
                    "@type" => "ItemList",
                    "itemListElement" => [
                        ["@type" => "ListItem", "position" => 1, "name" => "Harga sangat terjangkau"],
                        ["@type" => "ListItem", "position" => 2, "name" => "Mobil nyaman dan bersih"],
                        ["@type" => "ListItem", "position" => 3, "name" => "Sopir ramah dan profesional"],
                    ],
                ],
                "reviewRating" => [
                    "@type" => "Rating",
                    "ratingValue" => $ratingValue,
                    "bestRating" => 5,
                ],
                "author" => [
                    "@type" => "Person",
                    "name" => developer()['name'],
                ],
            ],
            "aggregateRating" => [
                "@type" => "AggregateRating",
                "ratingValue" => $ratingValue,
                "reviewCount" => $reviewCount,
                "bestRating" => 5,
            ],
        ];
    }
}
