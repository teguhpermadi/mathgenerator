<?php

namespace Teguhpermadi\Mathgenerator\Commands;

use Illuminate\Console\Command;

class MathgeneratorCommand extends Command
{
    public $signature = 'mathgenerator';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
