<?php

namespace Teguhpermadi\Mathgenerator\Helpers;

class SeedHelper
{
    /**
     * Menghasilkan angka random berdasarkan seed.
     *
     * @param int|string $seed Seed yang diinput
     * @param int $min Batas bawah angka
     * @param int $max Batas atas angka
     * @return int Angka random
     */
    public static function generateRandomNumber($seed, $min = 0, $max = 100)
    {
        // Konversi seed ke integer
        $hash = crc32($seed);
        mt_srand($hash);

        // Hasilkan angka random berdasarkan seed
        return mt_rand($min, $max);
    }

    /**
     * Get the place value of a number.
     *
     * @param int $number The number to get the place value.
     * @return array The place value of the number.
     */
    public static function placeValue(int $number)
    {
        // Convert the number to a string for easier manipulation
        $numberString = (string)$number;

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
     * @param int $min Batas bawah angka
     * @param int $max Batas atas angka
     * @param int $count Jumlah angka yang dihasilkan
     * @return array Angka random yang unik
     */
    public static function generateUniqueRandomNumbers(int $min, int $max, int $count) {
        // Buat array berisi angka dari min hingga max
        $numbers = range($min, $max);
    
        // Acak urutan elemen dalam array
        shuffle($numbers);
    
        // Ambil $count banyak elemen pertama dari array yang telah diacak
        return array_slice($numbers, 0, $count);
    }
}
