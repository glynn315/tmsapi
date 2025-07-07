<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeDomainModel extends GeneratorCommand
{
    protected $name = 'make:domain-model';
    protected $description = 'Create a new domain-based Eloquent model';
    protected $type = 'Model';

    protected function getStub()
    {
        return base_path('stubs/domain-model.stub');
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        $domain = $this->option('domain') ?? 'Shared';

        return "{$rootNamespace}\\Modules\\{$domain}\\Infrastructure\\Persistence\\Eloquent";
    }

    protected function getOptions()
    {
        return [
            ['domain', null, InputOption::VALUE_REQUIRED, 'The domain/module name'],
        ];
    }
}
