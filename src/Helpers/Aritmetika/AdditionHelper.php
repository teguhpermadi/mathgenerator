<?php

namespace Teguhpermadi\Mathgenerator\Helpers\Aritmetika;

use Egulias\EmailValidator\Warning\TLD;
use GeminiAPI\Client;
use GeminiAPI\Resources\ModelName;
use GeminiAPI\Resources\Parts\TextPart;
use Teguhpermadi\Mathgenerator\Helpers\SeedHelper;

class AdditionHelper
{
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
     * Generate an addition problem from two numbers.
     *
     * @param int $num1 First number.
     * @param int $num2 Second number.
     * @return array Contains the question and the answer.
     */
    public static function generateProblem(int $seed, int $min, int $max): array
    {
        srand($seed);
        $num1 = rand($min, $max);
        $num2 = rand($min, $max);

        $question = "$num1 + $num2 =";
        $answer = $num1 + $num2;

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
     * @param string $problem The problem string.
     * @return array Contains the question and the answer.
     */
    public static function generateAnyProblems(int $seed, int $min, $max, int $count = 10): array
    {
        srand($seed);
        $problems = [];

        for ($i = 0; $i < $count; $i++) {
            $num1 = rand($min, $max);
            $num2 = rand($min, $max);

            $question = "$num1 + $num2 =";
            $answer = $num1 + $num2;

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
     * @param int $num1 First number.
     * @param int $num2 Second number.
     * @return array Contains the question and the answer.
     */
    public static function generateWorldProblem(int $seed, int $min, int $max): array
    {
        srand($seed);
        $num1 = rand($min, $max);
        $num2 = rand($min, $max);

        $question = "$num1 + $num2 =";
        $answer = $num1 + $num2;

        $choices = self::generateChoice($answer);

        $client = new Client(env('GEMINI_API_KEY', 'AIzaSyBlW1AEMBkXN3mBoakF_lP0MdugAzfH9vA'));

        // create a generative model request
        $questionResponse = $client->generativeModel(ModelName::GEMINI_PRO)->generateContent(
            new TextPart('buatkan soal cerita dari penjumlahan berikut: ' . $num1 . ' + ' . $num2),
        );

        $answerResponse = $client->generativeModel(ModelName::GEMINI_PRO)->generateContent(
            new TextPart('contoh masalah: Ani memiliki 2 pensil dan Budi memiliki 3 pensil. Berapa jumlah pensil mereka?'),
            new TextPart('contoh jawaban: Jadi jumlah pensil mereka adalah {x} pensil.'),
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
            'world_problem' => $questionResponse->text(),
            'world_problem_choice' => $choices['choices'],
            'correct' => $choices['correct'],
        ];
    }

    /**
     * Generate any addition world problems from a seed number.
     *
     * @param string $problem The problem string.
     * @return array Contains the question and the answer.
     */
    public static function generateAnyWorldProblems(int $seed, int $min, $max, int $count = 10): array
    {
        srand($seed);
        $problems = [];

        for ($i = 0; $i < $count; $i++) {
            $num1 = rand($min, $max);
            $num2 = rand($min, $max);

            $question = "$num1 + $num2 =";
            $answer = $num1 + $num2;

            $choices = self::generateChoice($answer);

            $client = new Client(env('GEMINI_API_KEY', 'AIzaSyBlW1AEMBkXN3mBoakF_lP0MdugAzfH9vA'));

            // create a generative model request
            $questionResponse = $client->generativeModel(ModelName::GEMINI_PRO)->generateContent(
                new TextPart('buatkan soal cerita dari penjumlahan berikut: ' . $num1 . ' + ' . $num2),
            );

            $answerResponse = $client->generativeModel(ModelName::GEMINI_PRO)->generateContent(
                new TextPart('contoh masalah: Ani memiliki 2 pensil dan Budi memiliki 3 pensil. Berapa jumlah pensil mereka?'),
                new TextPart('contoh jawaban: Jadi jumlah pensil mereka adalah {x} pensil.'),
                new TextPart('Saya memiliki masalah: ' . $questionResponse->text()),
                new TextPart('Jawaban dari masalah tersebut dengan variable {x}.'),
            );

            $textAnswer = $answerResponse->text();

            // ambil setiap choice
            foreach ($choices['choices'] as $key => $value) {
                // ubah variable {x} dengan jawaban yang benar
                $choices['choices'][$key] = str_replace('{x}', $value, $textAnswer);
            }

            $problems[] = [
                'question' => $questionResponse->text(),
                'choices' => $choices['choices'],
                'correct' => $choices['correct'],
            ];
        }

        return $problems;
    }
}
