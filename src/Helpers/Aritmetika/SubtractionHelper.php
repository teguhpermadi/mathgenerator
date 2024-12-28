<?php

namespace Teguhpermadi\Mathgenerator\Helpers\Aritmetika;

use GeminiAPI\Client;
use GeminiAPI\Resources\ModelName;
use GeminiAPI\Resources\Parts\TextPart;
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
    public static function generateProblem(int $seed, int $min, $max, string $negative = '0'): array
    {
        srand($seed);
        $num1 = rand($min, $max);
        $num2 = rand($min, $num1);

        // switch case, jika 0 maka $num1 atau $num2 bernilai positif, jika 1 maka salah satu dari $num1 atau $num2 bernilai negatif, jika 2 maka kedua $num1 dan $num2 bernilai negatif
        switch ($negative) {
            case '0':
                $num1 = abs($num1);
                $num2 = abs($num2);
                break;

            case '1':
                $num1 = abs($num1);
                $num2 = -abs($num2);
                break;

            case '2':
                $num1 = -abs($num1);
                $num2 = -abs($num2);
                break;

            default:
                $num1 = abs($num1);
                $num2 = abs($num2);
                break;
        }

        $question = "$num1 - $num2 =";
        $answer = $num1 - $num2;

        $choice = self::generateChoice($answer);

        return [
            'question' => $question,
            'answer' => $answer,
            'choices' => $choice['choices'],
            'correct' => $choice['correct'],
        ];
    }

    /**
     * Generate any addition problems from a seed number.
     *
     * @param  string  $problem  The problem string.
     * @return array Contains the question and the answer.
     */
    public static function generateAnyProblems(int $seed, int $min, $max, int $count = 10, string $negative = '0'): array
    {
        srand($seed);
        $problems = [];

        for ($i = 0; $i < $count; $i++) {
            $num1 = rand($min, $max);
            $num2 = rand($min, $max);

            // switch case, jika 0 maka $num1 atau $num2 bernilai positif, jika 1 maka salah satu dari $num1 atau $num2 bernilai negatif, jika 2 maka kedua $num1 dan $num2 bernilai negatif
            switch ($negative) {
                case '0':
                    $num1 = abs($num1);
                    $num2 = abs($num2);
                    break;

                case '1':
                    $num1 = abs($num1);
                    $num2 = -abs($num2);
                    break;

                case '2':
                    $num1 = -abs($num1);
                    $num2 = -abs($num2);
                    break;

                default:
                    $num1 = abs($num1);
                    $num2 = abs($num2);
                    break;
            }

            $question = "$num1 - $num2 =";
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
    public static function generateWorldProblem(int $seed, int $min, int $max, bool $negative = false): array
    {
        srand($seed);
        $num1 = rand($min, $max);
        $num2 = rand($min, $max);

        if ($negative) {
            if ($num1 > $num2) {
                [$num1, $num2] = [$num2, $num1];
            } else {
                [$num1, $num2] = [$num1, $num2];
            }
        } else {
            if ($num1 < $num2) {
                [$num1, $num2] = [$num2, $num1];
            } else {
                [$num1, $num2] = [$num1, $num2];
            }
        }

        $question = "$num1 - $num2 =";
        $answer = $num1 - $num2;

        $choices = self::generateChoice($answer);

        $client = new Client(config('mathgenerator.gemini.api_key'));

        if ($negative) {
            // create a generative model request
            $questionResponse = $client->generativeModel(ModelName::GEMINI_PRO)->generateContent(
                new TextPart('buatkan soal cerita tentang implementasi bilangan negatif dalam kehidupan. Misalnya: suhu, utang, ketinggian (kartografi), waktu, laba-rugi, dan lain sebagainya.'),
                new TextPart('respon hanya soal cerita saja, tanpa judul atau penjelasan lainnya tentang cara penyelesaian soal tersebut.'),
                new TextPart('soal cerita tentang operasi pengurangan : ' . $num1 . ' - ' . $num2),
            );
        } else {
            // create a generative model request
            $questionResponse = $client->generativeModel(ModelName::GEMINI_PRO)->generateContent(
                new TextPart('buatkan soal cerita sederhana dari operasi pengurangan berikut: ' . $question),
            );
        }

        $answerResponse = $client->generativeModel(ModelName::GEMINI_PRO)->generateContent(
            new TextPart('contoh masalah: Ani memiliki 3 pensil dan Budi memiliki 2 pensil. Berapa selisih pensil mereka?'),
            new TextPart('contoh jawaban: Jadi selisih pensil mereka adalah {x} pensil.'),
            new TextPart('Saya memiliki masalah: ' . $questionResponse->text()),
            new TextPart('Jawaban dari masalah tersebut dengan variable {x}.'),
        );

        $textAnswer = $answerResponse->text();

        // ambil setiap choice
        foreach ($choices['choices'] as $key => $value) {
            // ubah variable {x} dengan jawaban yang benar
            $choices['choices'][$key] = str_replace('{x}', $value, $textAnswer);
        }

        return [
            'question' => $question,
            'answer' => $answer,
            'world_problem' => $questionResponse->text(),
            'world_problem_choice' => $choices['choices'],
            'correct' => $choices['correct'],
        ];
    }
}
