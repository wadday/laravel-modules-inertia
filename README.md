## Laravel Modules with Inertia/vue

This repo demonstrates Inertia app with laravel modules. Therefore, following the custom commands will be used instead of laravel modules command when using Inertia/vue stack.

| Command            | Description                                                      |
|--------------------|------------------------------------------------------------------|
| wue:make-module    | Create a new module. (wrapper of module:make)                    |
| wue:make-component | Create Inertia vue components for a given module                 |
| wue:link-module    | Create symbolic link to root asset/js directory for given module |

### Install

Clone the repo and run composer install

Basic laravel environment configurations

Run npm install && npm run dev

### Create New module
When creating module with custom command it will also create link between module resource/js to root/resource/js.
in this case link command is not required. but if module is created using default make command link command should be run after creating module.

`php artisan wue:make-module MODULE_NAME` 

### Create new component
When creating new component with below command it just create .vue component with defined layout extends for the module.
it takes 2 argument. First name of the component & second name of the module.

`php artisan wue:make-component component_name Module_name`

### Link module command
Link module will be runs after running `php artisan wue:make-cmodule` but if you decide to use laravel-modules `php artisan module:make` command than you would also need to link command. so that during npm build it can be compiled.

### Note
when deleting module the created symbolic link may exist, so manual action may require.
