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

    protected function getDefaultNamespace($domain): string
    {
        // Optional: customize for domain-specific folder structure
        return "app\\{$domain}\\Domain\\ValueObjects";
    }
}
