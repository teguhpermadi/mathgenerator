<?php

namespace Teguhpermadi\Mathgenerator\Database\Seeders;

use Illuminate\Database\Seeder;

class AdditionWorldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $problems = [
            // Soal 1: Buah-buahan
            [
                'problem' => '{character1} memiliki {x} {object1}. {character2} memberinya {y} {object1} lagi. Berapa jumlah {object1} {character1} sekarang?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
                'object' => ['fruit'],
            ],

            // Soal 2: Permen
            [
                'problem' => '{character1} punya {x} {object1}. {character2} punya {y} {object1}. Berapa jumlah {object1} mereka berdua?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
                'object' => ['candy'],
            ],

            // Soal 3: Mainan
            [
                'problem' => '{character1} memiliki {x} buah {object1}. {character2} memiliki {y} buah {object2}. Berapa jumlah mainan mereka berdua?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
                'object' => ['toy'],
            ],

            // Soal 4: Buku
            [
                'problem' => 'Di perpustakaan ada {x} {object1} dan {y} {object2}. Berapa jumlah semua buku di perpustakaan?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
                'object' => ['book'],
            ],

            // Soal 5: Pensil
            [
                'problem' => '{character1} membawa {x} pensil warna. {character2} membawa {y} pensil hitam. Berapa jumlah pensil mereka?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 6: Kelereng
            [
                'problem' => '{character1} punya {x} kelereng. Ia menemukan {y} kelereng lagi. Berapa jumlah kelereng {character1} sekarang?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 7: Kue
            [
                'problem' => '{character1} membuat {x} kue cokelat. {character2} membuat {y} kue keju. Berapa jumlah kue mereka?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 8: Burung
            [
                'problem' => 'Di pohon mangga ada {x} burung hijau dan {y} burung merah. Berapa jumlah semua burung di pohon?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 9: Ikan
            [
                'problem' => 'Dalam akuarium ada {x} ikan mas dan {y} ikan hias. Berapa jumlah semua ikan?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 10: Boneka
            [
                'problem' => '{character1} memiliki {x} boneka beruang. {character2} memiliki {y} boneka kelinci. Berapa jumlah boneka mereka berdua?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 11: Hewan Peliharaan
            [
                'problem' => '{character1} memiliki {x} ekor kucing. {character2} memiliki {y} ekor anjing. Berapa jumlah hewan peliharaan mereka berdua?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 12: Alat Tulis
            [
                'problem' => 'Di dalam tas {character1} ada {x} buah pulpen dan {y} buah pensil. Berapa jumlah alat tulis {character1}?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 13: Permen
            [
                'problem' => '{character1} membeli {x} {object}. Kemudian, {character1} membeli {y} {object} lagi. Berapa jumlah {object} {character1} sekarang?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
                'object' => ['candy'],
            ],

            // Soal 14: Buah
            [
                'problem' => 'Di dalam keranjang ada {x} buah mangga dan {y} buah jeruk. Berapa jumlah buah di dalam keranjang?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 15: Mainan
            [
                'problem' => '{character1} mendapat {x} buah balok sebagai hadiah ulang tahun. Kemudian, {character1} menemukan {y} buah mobil-mobilan di bawah tempat tidur. Berapa jumlah mainan {character1} sekarang?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 16: Piring
            [
                'problem' => 'Ibu punya {x} piring putih dan {y} piring warna-warni. Berapa jumlah piring Ibu semuanya?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 17: Mobil
            [
                'problem' => 'Di parkiran ada {x} mobil merah dan {y} mobil biru. Berapa jumlah semua mobil di parkiran?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 18: Buku
            [
                'problem' => 'Di rak buku ada {x} buku cerita dan {y} buku komik. Berapa jumlah semua buku di rak?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 19: Bunga
            [
                'problem' => 'Di taman ada {x} bunga mawar dan {y} bunga tulip. Berapa jumlah semua bunga di taman?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],

            // Soal 20: Pensil Warna
            [
                'problem' => '{character1} memiliki {x} pensil warna merah. {character2} memiliki {y} pensil warna biru. Berapa jumlah pensil warna mereka berdua?',
                'solution' => '{x} + {y}',
                'tag' => ['addition', 'easy'],
            ],
        ];
    }
}
