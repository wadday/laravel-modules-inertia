<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Nwidart\Modules\Commands\GeneratorCommand;
use Nwidart\Modules\Support\Config\GenerateConfigReader;
use Nwidart\Modules\Support\Stub;
use Nwidart\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class InertiaComponent extends GeneratorCommand
{
    use ModuleCommandTrait;

    protected $argumentName = 'component';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wue:make-component {component} {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Inertia vue components for a given module';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        if(parent::handle() === E_ERROR) {
            return E_ERROR;
        }

        return 0;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['component', InputArgument::REQUIRED, 'The name of the component.'],
            ['module', InputArgument::REQUIRED, 'The name of module will be used.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['component', null, InputOption::VALUE_OPTIONAL, 'The terminal command that should be assigned.', null],
        ];
    }

    protected function getTemplateContents(): string
    {
        return (new Stub('/component.stub', [
            'COMPONENT_NAME' => $this->getComponentName(),
            'MODULE' => $this->getModuleName(),
        ]))->render();
    }

    /**
     * @return string
     */
    private function getComponentName(): string
    {
        return Str::studly($this->argument('component'));
    }

    protected function getDestinationFilePath(): string
    {
        $path = $this->laravel['modules']->getModulePath($this->getModuleName());

        $componentPath = GenerateConfigReader::read('assets');

        return $path . $componentPath->getPath() . '/' . $this->getFileName() . '.vue';
    }

    /**
     * @return string
     */
    private function getFileName(): string
    {
        return Str::studly($this->argument('component'));
    }

    public function getDefaultNamespace() : string
    {
        $module = $this->laravel['modules'];

        return $module->config('paths.generator.assets.namespace') ?: $module->config('paths.generator.assets.path', 'Resources/js');
    }
}
