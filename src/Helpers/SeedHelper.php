<?php

namespace Teguhpermadi\Mathgenerator\Helpers;

class SeedHelper
{
    /**
     * Menghasilkan angka random berdasarkan seed.
     *
     * @param  int|string  $seed  Seed yang diinput
     * @return int Angka seed
     */
    public static function generateSeed($seed)
    {
        // Konversi seed ke integer
        $hash = crc32($seed);
        
        return $hash;
    }

    /**
     * Get the place value of a number.
     *
     * @param  int  $number  The number to get the place value.
     * @return array The place value of the number.
     */
    public static function placeValue(int $number)
    {
        // Convert the number to a string for easier manipulation
        $numberString = (string) $number;

        // Length of the number string
        $numberLength = strlen($numberString);

        // Initialize an array to store the results
        $result = [];

        // Iterate over each digit from left to right
        for ($i = 0; $i < $numberLength; $i++) {
            // Calculate the place value
            $placeValue = pow(10, $numberLength - $i - 1);

            // Store the result in the array
            $result[] = $placeValue;
        }

        return $result;
    }

    /**
     * Menghasilkan angka random yang unik.
     *
     * @param  int  $min  Batas bawah angka
     * @param  int  $max  Batas atas angka
     * @param  int  $count  Jumlah angka yang dihasilkan
     * @return array Angka random yang unik
     */
    public static function generateUniqueRandomNumbers(int $min, int $max, int $count)
    {
        // Buat array berisi angka dari min hingga max
        $numbers = range($min, $max);

        // Acak urutan elemen dalam array
        shuffle($numbers);

        // Ambil $count banyak elemen pertama dari array yang telah diacak
        return array_slice($numbers, 0, $count);
    }

    /**
     * Menghasilkan angka random berdasarkan seed.
     * @param int $seed Seed yang diinput
     * @param  int  $min  Batas bawah angka
     * @param  int  $max  Batas atas angka
     * @param  int  $count  Jumlah angka yang dihasilkan
     * @param string $negative 0, 1, 2
     * jika 0 maka $num1 atau $num2 bernilai positif, jika 1 maka salah satu dari $num1 atau $num2 bernilai negatif, jika 2 maka kedua $num1 dan $num2 bernilai negatif
     * @return array Angka random
     */
    public static function generateNumber(int $seed, int $min = 0, int $max = 100, int $count = 2, int $negative = 0)
    {
        // inputkan seed
        srand($seed);
        
        // jika $count kurang 1 maka set $count menjadi 1
        if ($count < 1) {
            $count = 1;
        }

        // Hasilkan angka random berdasarkan seed
        $numbers = [];

        for ($i = 0; $i < $count; $i++) {
            $num1 = mt_rand($min, $max);
            $num2 = mt_rand($min, $max);

            switch ($negative) {
                case 1:
                    // jika 1 maka num1 negatif jika 0 maka num2 negatif
                    $num1 = mt_rand(0, 1) ? -$num1 : $num1;
                    $num2 = mt_rand(0, 1) ? -$num2 : $num2;
                    break;

                case 2:
                    // jika 2 maka kedua $num1 dan $num2 bernilai negatif
                    $num1 = -$num1;
                    $num2 = -$num2;
                    break;

                default:
                    // jika 0 maka $num1 atau $num2 bernilai positif
                    break;
            
            }
            $numbers[] = [$num1, $num2];
        }

        return $numbers;
    }
}
