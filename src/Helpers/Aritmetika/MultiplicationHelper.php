<?php

namespace TeguhPermadi\MathGenerator\Helpers\Aritmetika;

use Teguhpermadi\Mathgenerator\Helpers\SeedHelper;

class MultiplicationHelper
{
    /**
     * Generate a choice for the answer.
     *
     * @param  int  $answer  The correct answer.
     * @return array Contains the choices and the correct answer.
     */
    public static function generateChoice(int $num1, int $num2, int $answer)
    {
        srand($answer);
        $choices = [];
        $placeValues = SeedHelper::placeValue($answer);
        $strLength = strlen($answer);

        switch ($strLength) {
            case 1:
                $choices[] = $answer - $num1;
                $choices[] = $answer + $num1;
                $choices[] = $answer + $num2;
                $choices[] = $answer - $num2;

                shuffle($choices);
                break;

            case 2:
                $choices[] = $answer + 1;
                $choices[] = $answer - 1;
                $choices[] = $answer + 10;
                $choices[] = $answer - 10;

                shuffle($choices);
                break;

            default:
                foreach ($placeValues as $placeValue) {
                    $choices[] = $answer - $placeValue;
                    $choices[] = $answer + $placeValue;
                }

                shuffle($choices);
                break;
        }

        // pilih hanya 3 pilihan jawaban acak
        $choices = array_slice($choices, 0, 3);

        // berikan kunci jawaban benar
        $choices[] = $answer;

        // acak semua pilihan jawaban
        shuffle($choices);

        // berikan key untuk setiap pilihan jawaban berupa A, B, C, D
        $choices = array_combine(range('A', 'D'), $choices);

        // buat kunci jawaban
        $correct = array_search($answer, $choices);

        return [
            'choices' => $choices,
            'correct' => $correct,
        ];
    }
    
    /**
     * Generate an multiplication problem from two numbers.
     *
     * @param  int  $num1  First number.
     * @param  int  $num2  Second number.
     * @return array Contains the question and the answer.
     */
    public static function generateProblem(int $seed, int $min, int $max, bool $negative = false, bool $allNegative = false): array
    {
        srand($seed);
        $num1 = rand($min, $max);
        $num2 = rand($min, $max);

        if ($negative) {
            // berikan tanda negatif pada num1 atau num2
            $num1 = rand(0, 1) ? $num1 : -$num1;
            $num2 = rand(0, 1) ? $num2 : -$num2;
        }

        if ($allNegative) {
            // berikan tanda negatif pada kedua num1 dan num2
            $num1 = -$num1;
            $num2 = -$num2;
        }

        $question = "$num1 * $num2 =";
        $answer = $num1 * $num2;

        $choices = self::generateChoice($num1, $num2, $answer);

        return [
            'question' => $question,
            'answer' => $answer,
            'choices' => $choices['choices'],
            'correct' => $choices['correct'],
        ];
    }

    /**
     * Generate any multiplication problems from a seed number.
     *
     * @param  string  $problem  The problem string.
     * @return array Contains the question and the answer.
     */
    public static function generateAnyProblems(int $seed, int $min, $max, int $count = 10, bool $negative = false, bool $allNegative = false): array
    {
        srand($seed);
        $problems = [];

        for ($i = 0; $i < $count; $i++) {
            $num1 = rand($min, $max);
            $num2 = rand($min, $max);

            if ($negative) {
                // berikan tanda negatif pada num1 atau num2
                $num1 = rand(0, 1) ? $num1 : -$num1;
                $num2 = rand(0, 1) ? $num2 : -$num2;
            }

            if ($allNegative) {
                // berikan tanda negatif pada kedua num1 dan num2
                $num1 = -$num1;
                $num2 = -$num2;
            }

            $question = "$num1 * $num2 =";
            $answer = $num1 * $num2;

            $choices = self::generateChoice($num1, $num2, $answer);

            $problems[] = [
                'question' => $question,
                'answer' => $answer,
                'choices' => $choices['choices'],
                'correct' => $choices['correct'],
            ];
        }

        return $problems;
    }
}
