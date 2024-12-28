<?php

namespace Teguhpermadi\Mathgenerator\Helpers\Aritmetika\WorldProblem;

class WorldProblemHelper
{
    public static function randomContex($seed)
    {
        srand($seed);

        $contex = [
            'mainan',
            'makanan',
            'minuman',
            'berkebun',
            'berolahraga',
            'hewan peliharaan',
            'buku',
            'pakaian',
            'alat tulis',
            'alat musik',
            'alat elektronik',
            'alat masak',
            'furniture',
            'kendaraan',
        ];

        return $contex[array_rand($contex)];
    }
}
