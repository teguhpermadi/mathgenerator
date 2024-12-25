<?php

use Illuminate\Support\Facades\Route;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\AdditionHelper;
use Teguhpermadi\Mathgenerator\Helpers\SeedHelper;

Route::get('math-generator', function () {
    $seed = 1;
    $min = 1;
    $max = 100;

    $random = SeedHelper::generateRandomNumber($seed);
    $addition = AdditionHelper::generateProblem($random, $min, $max);

    return response()->json([
        'random' => $random,
        'addition' => $addition,
    ]);
});
