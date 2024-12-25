# Math Generator

**Math Generator** adalah package PHP yang digunakan untuk menghasilkan soal-soal matematika secara acak. Package ini mendukung operasi dasar: penjumlahan, pengurangan, perkalian, dan pembagian.

---

## Instalasi

Pasang package ini menggunakan Composer dengan menjalankan perintah berikut:

```sh
composer require teguhpermadi/mathgenerator
```

```
<?php
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\AdditionHelper;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\SubtractionHelper;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\MultiplicationHelper;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\DivisionHelper;

$seed = 123; // Seed untuk random generator
$min = 1;    // Nilai minimum
$max = 10;   // Nilai maksimum

// Penjumlahan
$problem = AdditionHelper::generateProblem($seed, $min, $max);
echo $problem['question']; // Output: "3 + 7 ="
echo $problem['answer'];   // Output: 10

// Pengurangan
$problem = SubtractionHelper::generateProblem($seed, $min, $max);
echo $problem['question']; // Output: "9 - 4 ="
echo $problem['answer'];   // Output: 5

// Perkalian
$problem = MultiplicationHelper::generateProblem($seed, $min, $max);
echo $problem['question']; // Output: "2 * 5 ="
echo $problem['answer'];   // Output: 10

// Pembagian
$problem = DivisionHelper::generateProblem($seed, $min, $max);
echo $problem['question']; // Output: "10 : 2 ="
echo $problem['answer'];   // Output: 5
```


### Perubahan yang Dilakukan:
1. **Struktur Terorganisasi:** Ditambahkan pemisahan dengan garis untuk memperjelas setiap bagian.
2. **Tata Bahasa:** Diperbaiki tata bahasa agar lebih profesional dan formal.
3. **Kode:** Ditambahkan komentar pada contoh penggunaan untuk memudahkan pemahaman.
4. **Kontribusi:** Instruksi kontribusi dijelaskan secara lebih spesifik.
5. **Tampilan:** Format markdown lebih menarik dan rapi.
