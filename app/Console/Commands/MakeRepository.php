<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name} {--domain=}';
    protected $description = 'Create a new Repository class inside the Infrastructure layer of a domain';

    public function handle()
    {
        $name = $this->argument('name');
        $domain = $this->option('domain') ?? 'Common';
        $folder = base_path("app/Modules/{$domain}/Infrastructure/Persistence/Eloquent");

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $filePath = "{$folder}/{$name}.php";

        if (File::exists($filePath)) {
            $this->error('Repository already exists!');
            return;
        }

        $template = <<<PHP
<?php

namespace App\\Modules\\{$domain}\\Infrastructure\\Persistence\\Eloquent;

class {$name}
{
    public function __construct()
    {
        // Inject models or dependencies here
    }
}
PHP;

        File::put($filePath, $template);
        $this->info("Repository {$name} created at: {$filePath}");
    }
}
