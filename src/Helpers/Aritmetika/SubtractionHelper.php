<?php

namespace Teguhpermadi\Mathgenerator\Helpers\Aritmetika;

use GeminiAPI\Client;
use GeminiAPI\Resources\ModelName;
use GeminiAPI\Resources\Parts\TextPart;
use Teguhpermadi\Mathgenerator\Helpers\Aritmetika\WorldProblem\WorldProblemHelper;
use Teguhpermadi\Mathgenerator\Helpers\SeedHelper;

class SubtractionHelper
{
    /**
     * Generate a choice for the answer.
     *
     * @param  int  $answer  The correct answer.
     * @return array Contains the choices and the correct answer.
     */
    public static function generateChoice(int $answer)
    {
        srand($answer);
        $choices = [];
        $placeValues = SeedHelper::placeValue($answer);
        $strLength = strlen($answer);

        switch ($strLength) {
            case 1:
                $choices[] = $answer + 1;
                $choices[] = $answer - 1;
                $choices[] = $answer + 2;
                $choices[] = $answer - 2;

                shuffle($choices);
                break;

            case 2:
                $choices[] = $answer + 1;
                $choices[] = $answer - 1;
                $choices[] = $answer + 10;
                $choices[] = $answer - 10;

                shuffle($choices);
                break;

            case 3:
                $choices[] = $answer + 1;
                $choices[] = $answer - 1;
                $choices[] = $answer + 10;
                $choices[] = $answer - 10;
                $choices[] = $answer + 100;
                $choices[] = $answer - 100;

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
     * Generate a subtraction problem from two numbers.
     *
     * @param  int  $seed  Seed for random number generation.
     * @param  int  $min  Minimum value for random numbers.
     * @param  int  $max  Maximum value for random numbers.
     * @param  bool  $negative  Allow negative results.
     * @return array Contains the question and the answer.
     */
    public static function generateProblem(int $seed, int $min, int $max, int $count = 3, int $negative = 0)
    {
        srand($seed);
        $problems = [];
        $questions = SeedHelper::generateNumber($seed, $min, $max, $count, $negative);

        foreach ($questions as $question) {
            $num1 = $question[0];
            $num2 = $question[1];

            // switch case, jika 0 maka $num1 atau $num2 bernilai positif, jika 1 maka salah satu dari $num1 atau $num2 bernilai negatif, jika 2 maka kedua $num1 dan $num2 bernilai negatif
            switch ($negative) {
                case 0:
                    $num1 = abs($num1);
                    $num2 = abs($num2);
                    break;

                case 1:
                    $num1 = abs($num1);
                    $num2 = -abs($num2);
                    break;

                case 2:
                    $num1 = -abs($num1);
                    $num2 = -abs($num2);
                    break;

                default:
                    $num1 = abs($num1);
                    $num2 = abs($num2);
                    break;
            }

            $question = "$num1 - $num2";
            $answer = $num1 - $num2;

            $choice = self::generateChoice($answer);

            $problems[] = [
                'question' => $question,
                'answer' => $answer,
                'choices' => $choice['choices'],
                'correct' => $choice['correct'],
            ];
        }

        return $problems;
    }

    /**
     * Generate an addition world problem from two numbers.
     *
     * @param  int  $num1  First number.
     * @param  int  $num2  Second number.
     * @return array Contains the question and the answer.
     */
    public static function generateWorldProblem(int $seed, int $min, int $max, int $count = 3, int $negative = 0, int $level = 1): array
    {
        srand($seed);

        $problems = [];
        $questions = SeedHelper::generateNumber($seed, $min, $max, $count);
        $context = WorldProblemHelper::randomContex($seed);

        foreach ($questions as $question) {
            $num1 = $question[0];
            $num2 = $question[1];

            // switch case, jika 0 maka $num1 atau $num2 bernilai positif, jika 1 maka salah satu dari $num1 atau $num2 bernilai negatif, jika 2 maka kedua $num1 dan $num2 bernilai negatif
            switch ($negative) {
                case 0:
                    $num1 = abs($num1);
                    $num2 = abs($num2);
                    break;

                case 1:
                    $num1 = abs($num1);
                    $num2 = -abs($num2);
                    break;

                case 2:
                    $num1 = -abs($num1);
                    $num2 = -abs($num2);
                    break;

                default:
                    $num1 = abs($num1);
                    $num2 = abs($num2);
                    break;
            }

            $question = "$num1 - $num2";
            $answer = $num1 - $num2;

            $choices = self::generateChoice($answer);

            $client = new Client(config('mathgenerator.gemini.api_key'));
            // jika level 0 berarti $questionLevel = mudah, jika level 1 berarti $questionLevel = sedang, jika level 2 berarti $questionLevel = sulit
            $questionLevel = $level == 0 ? 'mudah' : ($level == 1 ? 'sedang' : 'sulit');

            // create a generative model request
            $questionResponse = $client->generativeModel(ModelName::GEMINI_PRO)->generateContent(
                new TextPart('soal cerita pengurangan dengan tingkat kesulitan'.$questionLevel.' yang melibatkan soal berikut: '.$question),
                new TextPart('Pastikan diawal cerita terdapat kalimat stimulus untuk menjelaskan konteks soal cerita.'),
                new TextPart('Pastikan soal cerita yang dibuat menggunakan bilangan yang sesuai dengan soal tanpa diberikan tambahan apapun.'),
                new TextPart('Pastikan soal cerita yang kamu buat menggunakan konteks '.$context.'.'),
                new TextPart('Hasil keluaran harus berupa kalimat tanya langsung yang murni soal cerita penjumlahan.'),
            );

            $problems[] = [
                'question' => $question,
                'answer' => $answer,
                'world_problem' => $questionResponse->text(),
                'multiple_choice' => [
                    'choices' => $choices['choices'],
                    'correct' => $choices['correct'],
                ],
            ];
        }

        return $problems;
    }
}
