<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeValueObject extends GeneratorCommand
{
    protected $name = 'make:value-object';
    protected $description = 'Create a new Value Object class';
    protected $type = 'ValueObject';

    protected function getStub(): string
    {
        return base_path('stubs/value-object.stub');
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        $module = $this->option('domain') ?? 'Shared';
        return "App\\Modules\\{$module}\\Domain\\ValueObjects";
    }

    protected function getOptions()
    {
        return [
            ['domain', null, \Symfony\Component\Console\Input\InputOption::VALUE_REQUIRED, 'The domain/module this value object belongs to.'],
        ];
    }
}
