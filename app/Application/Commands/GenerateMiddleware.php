<?php


namespace App\Application\Commands;


use Illuminate\Console\Command;

class GenerateMiddleware extends Command
{
    protected $signature = 'generate:middleware {module} {middleware}';

    protected $description = 'Cria um novo middleware em um módulo';

    public function handle()
    {
        $moduleName = ucfirst($this->argument('module'));
        if (!$this->moduleExists($moduleName)) {
            $this->output->text('Módulo não existe');
            return;
        }

        $this->createMiddleware($moduleName);
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

    protected function createMiddleware(string $moduleName)
    {
        $middlewareName = $this->argument('middleware');
        $realFile = $this->getDomainsPath() . '/' . $moduleName . '/Http/Middleware/' . $middlewareName . '.php';
        $stubFile = file_get_contents($this->getStubPath('Middleware'));
        $stubFile = str_replace(
            [
                '$MIDDLEWARE_NAME$',
                '$NAMESPACE$',
            ],
            [
                $middlewareName,
                'App\\Domain\\' . $moduleName . '\\Http\\Middleware',
            ],
            $stubFile
        );
        touch($realFile);
        file_put_contents($realFile, $stubFile);
    }
}

