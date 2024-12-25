<?php

use Illuminate\Support\Facades\Route;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\AdditionHelper;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\SubtractionHelper;
use Teguhpermadi\Mathgenerator\Helpers\SeedHelper;

Route::get('math-generator/addition', function () {
    $seed = request('seed', 'teguhpermadi');
    $min = request('min', 1);
    $max = request('max', 100);
    $count = request('count', 3);

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

Route::get('math-generator/subtraction', function () {
    $seed = request('seed', 'teguhpermadi');
    $min = request('min', 1);
    $max = request('max', 100);
    $count = request('count', 3);
    $negative = request('negative', false);

    $random = SeedHelper::generateRandomNumber($seed);
    $subraction = SubtractionHelper::generateProblem($random, $min, $max, $negative);
    $anySubtractions = SubtractionHelper::generateAnyProblems($random, $min, $max, $count, $negative);
    $subtractionWorldProblem = SubtractionHelper::generateWorldProblem($random, $min, $max, $negative);
    // $additonAnyWorldProblems = SubtractionHelper::generateAnyWorldProblems($random, $min, $max, $count);

    return response()->json([
        'random' => $random,
        'subtraction' => $subraction,
        'any_subtractions' => $anySubtractions,
        'subtraction_world_problem' => $subtractionWorldProblem,
        // 'any_addition_world_problems' => $additonAnyWorldProblems,
    ]);
});