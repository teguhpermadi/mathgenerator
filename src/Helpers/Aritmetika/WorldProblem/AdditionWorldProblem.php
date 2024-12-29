<?php

namespace Teguhpermadi\Mathgenerator\Helpers\Aritmetika\WorldProblem;

class AdditionWorldProblem
{
    /**
     * Generate a world problem.
     *
     * @param  int  $seed  The seed.
     * @param  int  $min  The minimum number.
     * @param  int  $max  The maximum number.
     * @return array Contains the problem and the answer.
     */
    public static function generateWorldProblem(int $seed, int $min, int $max)
    {
        srand($seed);
        $num1 = rand($min, $max);
        $num2 = rand($min, $max);
        $answer = $num1 + $num2;

        return [
            'problem' => "$num1 + $num2 = ?",
            'answer' => $answer,
        ];
    }
}
