<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LinkModuleCommand extends Command
{
    protected $signature = 'wue:link-module {module}';

    protected $description = 'Create symbolic link to root asset/js directory for given module';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @return void
     */
    public function handle()
    {
        $name = ucwords($this->argument('module'));

        $module = app('modules')->find($name);
        if($module) {
            if (file_exists(resource_path('js/Pages/'.$name))) {
                return $this->error('The resources/js/Pages/'.$name.' already exist.');
            }

            if (is_link(resource_path('js/Pages/'.$name))) {
                $this->laravel->make('files')->delete(resource_path('js/Pages/'.$name));
            }

            $this->laravel->make('files')->link(
                base_path('Modules/'.$name.'/Resources/js'), resource_path('js/Pages/'.$name)
            );

            $this->info('The [resources/js/Pages/'.$name.'] directory has been linked.');
        } else {
            $this->info('Make sure to link only module that are exist in Modules directory.');
        }
    }
}
