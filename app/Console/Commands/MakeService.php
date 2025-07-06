<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    protected $signature = 'make:service {name} {--domain=}';
    protected $description = 'Create a new Service class inside the Application layer of a domain';

    public function handle()
    {
        $name = $this->argument('name');
        $domain = $this->option('domain') ?? 'Common';
        $folder = base_path("app/{$domain}/Application/Services");

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $filePath = "{$folder}/{$name}.php";

        if (File::exists($filePath)) {
            $this->error('Service already exists!');
            return;
        }

        $template = <<<PHP
<?php

namespace App\\{$domain}\\Application\\Services;

class {$name}
{
    public function __construct()
    {
        //
    }
}
PHP;

        File::put($filePath, $template);
        $this->info("Service {$name} created at: {$filePath}");
    }
}
