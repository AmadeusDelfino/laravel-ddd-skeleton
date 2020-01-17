<?php


namespace App\Application\Commands;


use Illuminate\Console\Command;

class GenerateModule extends Command
{
    protected $signature = 'generate:module {name}';

    protected $description = 'Criar um novo módulo com suas estruturas básicas';

    protected $defaultClassStubs = [
        'ServiceProvider' => 'Providers',
        'EventServiceProvider' => 'Providers',
        'RouteServiceProvider' => 'Providers',
    ];

    protected $defaultFileStubs = [
        'Config' => '',
        'Routes' => 'Http',
    ];

    protected $defaultFolders = [
        'Contracts',
        'Exceptions',
        'Http',
        'Http/Controllers',
        'Migrations',
        'Models',
        'Observers',
        'Providers',
        'Repositories',
        'Requests',
        'Services',
        'Translations',
    ];

    public function handle()
    {
        $moduleName = ucfirst($this->argument('name'));
        if ($this->moduleExists($moduleName)) {
            $this->output->text('Modulo já existe');
            return;
        }

        $this->createModuleDirectory($moduleName);
        $this->createDefaultStructureDirectories($moduleName);
        $this->createDefaultClasses($moduleName);
        $this->createDefaultFiles($moduleName);
    }

    protected function moduleExists($moduleName)
    {
        return is_dir($this->getDomainsPath() . '/' . ($moduleName));
    }

    protected function createDefaultStructureDirectories($module, $folders = null)
    {
        foreach ($this->defaultFolders as $folder) {
            mkdir($this->getDomainsPath() . '/' . ucfirst($module) . '/' . $folder);
        }

    }

    protected function createModuleDirectory($module)
    {
        mkdir($this->getDomainsPath() . '/' . ucfirst($module));
    }

    protected function getDomainsPath()
    {
        return app_path('Domain');
    }

    protected function getStubPath($stub)
    {
        return app_path('Application/Generator/stubs/' . $stub . '.stub');
    }

    protected function createDefaultClasses(string $moduleName)
    {
        foreach ($this->defaultClassStubs as $stub => $path) {
            $realFile = $this->getDomainsPath() . '/' . $moduleName . '/' . $path . '/' . $moduleName . $stub . '.php';
            $stubFile = file_get_contents($this->getStubPath($stub));
            $stubFile = str_replace(
                [
                    '$CLASS$',
                    '$NAMESPACE$',
                    '$MODULE_NAME$',
                    '$CONTROLLERS_NAMESPACE$',
                    '$MODULE$',
                ],
                [
                    $moduleName . $stub,
                    'App\\Module\\' . $moduleName . '\\' . $path,
                    lcfirst($moduleName),
                    'App\\Module\\' . $moduleName . '\\Http\\Controllers',
                    $moduleName,
                ],
                $stubFile
            );
            touch($realFile);
            file_put_contents($realFile, $stubFile);
        }
    }

    protected function createDefaultFiles(string $moduleName)
    {
        foreach ($this->defaultFileStubs as $stub => $path) {
            if(empty($path)) {
                $realFile = $this->getDomainsPath() . '/' . $moduleName . '/' . lcfirst($stub) . '.php';
            } else {
                $realFile = $this->getDomainsPath() . '/' . $moduleName . '/' . $path . '/' . lcfirst($stub) . '.php';
            }
            $stubFile = file_get_contents($this->getStubPath($stub));
            $stubFile = str_replace(
                [
                ],
                [
                ],
                $stubFile
            );
            touch($realFile);
            file_put_contents($realFile, $stubFile);
        }
    }
}
