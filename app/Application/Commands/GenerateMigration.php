<?php


namespace App\Application\Commands;


use Illuminate\Console\Command;

class GenerateMigration extends Command
{
    protected $signature = 'generate:migration {module} {table}';

    protected $description = 'Cria uma nova migration em um módulo';

    public function handle()
    {
        $moduleName = ucfirst($this->argument('module'));
        if (!$this->moduleExists($moduleName)) {
            $this->output->text('Módulo não existe');
            return;
        }

        $this->createMigration($moduleName);
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

    protected function createMigration(string $moduleName)
    {
        $tableName = $this->argument('table');
        $classNameExploded = explode('_', $tableName);
        $classNameExploded = array_map(function ($item) {
            return ucfirst($item);
        }, $classNameExploded);
        $className = implode('', $classNameExploded);
        $migrationName = date('Y') . '_' . date('m') . '_' . date('d') . '_' . date('H') . date('H') . date('i') . date('s') . '_create_' . $tableName . '_table';
        $realFile = $this->getDomainsPath() . '/' . $moduleName . '/Migrations/' . $migrationName . '.php';
        $stubFile = file_get_contents($this->getStubPath('Migration'));
        $stubFile = str_replace(
            [
                '$TABLE_NAME$',
                '$CLASS_TABLE_NAME$',
            ],
            [
                $tableName,
                $className,
            ],
            $stubFile
        );
        touch($realFile);
        file_put_contents($realFile, $stubFile);
    }
}

