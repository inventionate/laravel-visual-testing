<?php

namespace STS\Percy\Console;

class DuskFailsCommand extends DuskCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dusk:fails
                            {--without-tty : Disable output to TTY}
                            {--without-percy : Disable percy snapshots}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the failing Dusk tests from the last run and stop on failure';

    /**
     * Get the array of arguments for running PHPUnit.
     *
     * @param  array  $options
     * @return array
     */
    protected function phpunitArguments($options)
    {
        return array_unique(array_merge(parent::phpunitArguments($options), [
            '--cache-result', '--order-by=defects', '--stop-on-failure',
        ]));
    }
}