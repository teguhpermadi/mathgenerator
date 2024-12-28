<?php

use Illuminate\Support\Facades\Route;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\AdditionHelper;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\MultiplicationHelper;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\SubtractionHelper;
use Teguhpermadi\Mathgenerator\Helpers\SeedHelper;

Route::get('math-generator/addition', function () {
    $seed = request('seed', 'teguhpermadi');
    $min = request('min', 1);
    $max = request('max', 100);
    $count = request('count', 3);
    $negative = request('negative', 0);
    $level = request('level', 1);

    $random = SeedHelper::generateSeed($seed);
    $addition = AdditionHelper::generateProblem($random, $min, $max, $count, $negative);
    $additonWorldProblem = AdditionHelper::generateWorldProblem($random, $min, $max, $count, $level);
    // $additonAnyWorldProblems = AdditionHelper::generateAnyWorldProblems($random, $min, $max, $count);

    return response()->json([
        'random' => $random,
        'addition' => $addition,
        'addition_world_problem' => $additonWorldProblem,
    ]);
});

Route::get('math-generator/subtraction', function () {
    $seed = request('seed', 'teguhpermadi');
    $min = request('min', 1);
    $max = request('max', 100);
    $count = request('count', 3);
    $negative = request('negative', false);

    $random = SeedHelper::generateSeed($seed);
    $subraction = SubtractionHelper::generateProblem($random, $min, $max, $negative);
    $anySubtractions = SubtractionHelper::generateAnyProblems($random, $min, $max, $count, $negative);
    // $subtractionWorldProblem = SubtractionHelper::generateWorldProblem($random, $min, $max, $negative);
    // $additonAnyWorldProblems = SubtractionHelper::generateAnyWorldProblems($random, $min, $max, $count);

    return response()->json([
        'random' => $random,
        'subtraction' => $subraction,
        'any_subtractions' => $anySubtractions,
        // 'subtraction_world_problem' => $subtractionWorldProblem,
        // 'any_addition_world_problems' => $additonAnyWorldProblems,
    ]);
});

Route::get('math-generator/multiplication', function () {
    $seed = request('seed', 'teguhpermadi');
    $min = request('min', 1);
    $max = request('max', 100);
    $count = request('count', 3);
    $negative = request('negative', false);
    $allNegative = request('all_negative', false);

    $random = SeedHelper::generateSeed($seed);
    $multiplication = MultiplicationHelper::generateProblem($random, $min, $max, $negative, $allNegative);
    $anyMultiplications = MultiplicationHelper::generateAnyProblems($random, $min, $max, $count, $negative, $allNegative);
    // $multiplicationWorldProblem = MultiplicationHelper::generateWorldProblem($random, $min, $max);
    // $additonAnyWorldProblems = MultiplicationHelper::generateAnyWorldProblems($random, $min, $max, $count);

    return response()->json([
        'random' => $random,
        'multiplication' => $multiplication,
        'any_multiplications' => $anyMultiplications,
        // 'multiplication_world_problem' => $multiplicationWorldProblem,
        // 'any_addition_world_problems' => $additonAnyWorldProblems,
    ]);
});


Route::get('math-generator/number', function () {
    $seed = request('seed', 'teguhpermadi');
    $min = request('min', 1);
    $max = request('max', 100);
    $count = request('count', 2);
    $negative = request('negative', 0);

    $random = SeedHelper::generateSeed($seed);
    $number = SeedHelper::generateNumber($random, $min, $max, $count, $negative);

    return response()->json([
        'seed' => $random,
        'number' => $number,
    ]);
});

Route::get('tes', function () {
    
});