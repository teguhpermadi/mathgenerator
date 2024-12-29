<?php

use Illuminate\Support\Facades\Route;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\AdditionHelper;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\MultiplicationHelper;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\SubtractionHelper;
use Teguhpermadi\Mathgenerator\Helpers\SeedHelper;

Route::get('math-generator/addition', function () {
    $seed = request('seed', 'teguhpermadi');
    $min = (int) request('min', 1);
    $max = (int) request('max', 100);
    $count = (int) request('count', 3);
    $negative = (int) request('negative', 0);
    $level = (int) request('level', 1);

    $random = SeedHelper::generateSeed($seed);
    $addition = AdditionHelper::generateProblem($random, $min, $max, $count, $negative);
    $additonWorldProblem = AdditionHelper::generateWorldProblem($random, $min, $max, $count, $level);

    return response()->json([
        'random' => $random,
        'addition' => $addition,
        'addition_world_problem' => $additonWorldProblem,
    ]);
});

Route::get('math-generator/subtraction', function () {
    $seed = request('seed', 'teguhpermadi');
    $min = (int) request('min', 1);
    $max = (int) request('max', 100);
    $count = (int) request('count', 3);
    $negative = (int) request('negative', 0);
    $level = (int) request('level', 1);

    $random = SeedHelper::generateSeed($seed);
    $subraction = SubtractionHelper::generateProblem($random, $min, $max, $count, $negative);
    $subtractionWorldProblem = SubtractionHelper::generateWorldProblem($random, $min, $max, $count, $negative, $level);

    return response()->json([
        'random' => $random,
        'subtraction' => $subraction,
        'subtraction_world_problem' => $subtractionWorldProblem,
    ]);
});

Route::get('math-generator/multiplication', function () {
    $seed = request('seed', 'teguhpermadi');
    $min = (int) request('min', 1);
    $max = (int) request('max', 100);
    $count = (int) request('count', 3);
    $negative = (int) request('negative', 0);
    $level = (int) request('level', 1);

    $random = SeedHelper::generateSeed($seed);
    $multiplication = MultiplicationHelper::generateProblem($random, $min, $max, $count, $negative);
    $multiplicationWorldProblem = MultiplicationHelper::generateWorldProblem($random, $min, $max, $count, $negative);

    return response()->json([
        'random' => $random,
        'multiplication' => $multiplication,
        'multiplication_world_problem' => $multiplicationWorldProblem,
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