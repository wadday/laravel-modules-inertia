<?php

namespace App\Console\Commands;

use Nwidart\Modules\Commands\ModuleMakeCommand as Command;

class ModuleMakeCommand extends Command
{
    protected $name = 'wue:make-module';

    protected $description = 'Create a new module.';

    public function handle(): int
    {
        $names = $this->argument('name');
        parent::handle();

        $this->call('wue:link-module', ['module' => $names[0]]);


        return 0;
    }

}
