<?php

namespace Teguhpermadi\Mathgenerator\Helpers\Aritmetika;

class DivisionHelper
{
    /**
     * Generate a division problem from two numbers.
     *
     * @param int $seed Seed for random number generation.
     * @param int $min Minimum value for random numbers.
     * @param int $max Maximum value for random numbers.
     * @param bool $negative Allow negative results.
     * @return array Contains the question and the answer.
     */
    public static function generateProblem(int $seed, int $min, $max): array
    {
        srand($seed);
        $num1 = rand($min, $max);
        $num2 = rand($min, $num1);
        $num3 = $num1 * $num2;

        $question = "$num3 : $num1 =";
        $answer = $num3 / $num1;

        return [
            'question' => $question,
            'answer' => $answer,
        ];
    }

    /**
     * Generate any division problems from a seed number.
     *
     * @param string $problem The problem string.
     * @return array Contains the question and the answer.
     */
    public static function generateAnyProblems(int $seed, int $min, $max, int $count = 10): array
    {
        srand($seed);
        $problems = [];

        for ($i=0; $i < $count; $i++) { 
            $num1 = rand($min, $max);
            $num2 = rand($min, $max);
            $num3 = $num1 * $num2;

            $question = "$num3 : $num1 =";
            $answer = $num2;

            $problems[] = [
                'question' => $question,
                'answer' => $answer,
            ];
        }

        return $problems;
    }
}
