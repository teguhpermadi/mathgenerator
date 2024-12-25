<?php

use Illuminate\Support\Facades\Route;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\AdditionHelper;
use Teguhpermadi\Mathgenerator\Helpers\SeedHelper;

Route::get('math-generator/addition', function () {
    $seed = 'teguhpermadi';
    $min = 1;
    $max = 100;
    $count = 3;

    $random = SeedHelper::generateRandomNumber($seed);
    $addition = AdditionHelper::generateProblem($random, $min, $max);
    $anyAdditions = AdditionHelper::generateAnyProblems($random, $min, $max, $count);
    $additonWorldProblem = AdditionHelper::generateWorldProblem($random, $min, $max);
    $additonAnyWorldProblems = AdditionHelper::generateAnyWorldProblems($random, $min, $max, $count);

    return response()->json([
        'random' => $random,
        'addition' => $addition,
        'any_additions' => $anyAdditions,
        'addition_world_problem' => $additonWorldProblem,
        'any_addition_world_problems' => $additonAnyWorldProblems,
    ]);
});
