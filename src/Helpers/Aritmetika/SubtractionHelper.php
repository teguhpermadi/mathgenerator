<?php

namespace Teguhpermadi\Mathgenerator\Helpers\Aritmetika;

class SubtractionHelper
{
    /**
     * Generate a subtraction problem from two numbers.
     *
     * @param int $seed Seed for random number generation.
     * @param int $min Minimum value for random numbers.
     * @param int $max Maximum value for random numbers.
     * @param bool $negative Allow negative results.
     * @return array Contains the question and the answer.
     */
    public static function generateProblem(int $seed, int $min, $max, bool $negative = false): array
    {
        srand($seed);
        $num1 = rand($min, $max);
        $num2 = rand($min, $num1);

        if ($negative) {
            if ($num1 > $num2) {
                list($num1, $num2) = [$num2, $num1];
            } else {
                list($num1, $num2) = [$num1, $num2];
            }
        } else {
            if ($num1 < $num2) {
                list($num1, $num2) = [$num2, $num1];
            } else {
                list($num1, $num2) = [$num1, $num2];
            }
        }

        $question = "$num1 - $num2 =";
        $answer = $num1 - $num2;

        return [
            'question' => $question,
            'answer' => $answer,
        ];
    }

    /**
     * Generate any addition problems from a seed number.
     *
     * @param string $problem The problem string.
     * @return array Contains the question and the answer.
     */
    public static function generateAnyProblems(int $seed, int $min, $max, int $count = 10, bool $negative = false): array
    {
        srand($seed);
        $problems = [];

        for ($i=0; $i < $count; $i++) { 
            $num1 = rand($min, $max);
            $num2 = rand($min, $max);

            if ($negative) {
                if ($num1 > $num2) {
                    list($num1, $num2) = [$num2, $num1];
                } else {
                    list($num1, $num2) = [$num1, $num2];
                }
            } else {
                if ($num1 < $num2) {
                    list($num1, $num2) = [$num2, $num1];
                } else {
                    list($num1, $num2) = [$num1, $num2];
                }
            }

            $question = "$num1 - $num2 =";
            $answer = $num1 - $num2;

            $problems[] = [
                'question' => $question,
                'answer' => $answer,
            ];
        }

        return $problems;
    }
}