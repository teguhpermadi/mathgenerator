<?php

namespace TeguhPermadi\MathGenerator\Helpers\Aritmetika;

class MultiplicationHelper
{
    /**
     * Generate an multiplication problem from two numbers.
     *
     * @param  int  $num1  First number.
     * @param  int  $num2  Second number.
     * @return array Contains the question and the answer.
     */
    public static function generateProblem(int $seed, int $min, int $max): array
    {
        srand($seed);
        $num1 = rand($min, $max);
        $num2 = rand($min, $max);

        $question = "$num1 * $num2 =";
        $answer = $num1 * $num2;

        return [
            'question' => $question,
            'answer' => $answer,
        ];
    }

    /**
     * Generate any multiplication problems from a seed number.
     *
     * @param  string  $problem  The problem string.
     * @return array Contains the question and the answer.
     */
    public static function generateAnyProblems(int $seed, int $min, $max, int $count = 10): array
    {
        srand($seed);
        $problems = [];

        for ($i = 0; $i < $count; $i++) {
            $num1 = rand($min, $max);
            $num2 = rand($min, $max);

            $question = "$num1 * $num2 =";
            $answer = $num1 * $num2;

            $problems[] = [
                'question' => $question,
                'answer' => $answer,
            ];
        }

        return $problems;
    }
}
