<?php


namespace App\Application\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateCommand extends Command
{
    protected $signature = 'generate:command {module} {command_name}';

    protected $description = 'Cria um novo command em um módulo';

    public function handle()
    {
        $moduleName = Str::studly(($this->argument('module')));
        if (!$this->moduleExists($moduleName)) {
            $this->output->text('Módulo não existe');
            return;
        }

        $this->createCommand($moduleName);
    }

    protected function moduleExists($moduleName)
    {
        return is_dir($this->getDomainsPath() . '/' . ($moduleName));
    }

    protected function getDomainsPath()
    {
        return app_path('Domain');
    }

    protected function getStubPath($stub)
    {
        return app_path('Application/Generator/stubs/' . $stub . '.stub');
    }

    protected function createCommand(string $moduleName)
    {
        $commandName = $this->argument('command_name');
        $realFile = $this->getDomainsPath() . '/' . $moduleName . '/Commands/' . $commandName . '.php';
        $stubFile = file_get_contents($this->getStubPath('Command'));
        $stubFile = str_replace(
            [
                '$COMMAND_NAME$',
                '$NAMESPACE$',
            ],
            [
                $commandName,
                'App\\Domain\\' . $moduleName . '\\Commands',
            ],
            $stubFile
        );
        touch($realFile);
        file_put_contents($realFile, $stubFile);
    }
}

