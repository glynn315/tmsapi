<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeEntity extends Command
{
    protected $signature = 'make:entity {name} {--domain=}';
    protected $description = 'Create a new Entity class inside the Domain layer of a domain';

    public function handle()
    {
        $name = $this->argument('name');
        $domain = $this->option('domain') ?? 'Common';
        $folder = base_path("app/{$domain}/Domain/Entities");

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $filePath = "{$folder}/{$name}.php";

        if (File::exists($filePath)) {
            $this->error('Entity already exists!');
            return;
        }

        $template = <<<PHP
<?php

namespace App\\{$domain}\\Domain\\Entities;

class {$name}
{
    public function __construct()
    {
        // Initialize entity values here
    }
}
PHP;

        File::put($filePath, $template);
        $this->info("Entity {$name} created at: {$filePath}");
    }
}
