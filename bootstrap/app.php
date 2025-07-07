<?php

use App\Console\Commands\MakeDomainModel;
use App\Console\Commands\MakeEntity;
use App\Console\Commands\MakeRepository;
use App\Console\Commands\MakeService;
use App\Console\Commands\MakeValueObject;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withCommands([
        MakeDomainModel::class,
        MakeEntity::class,
        MakeService::class,
        MakeRepository::class,
        MakeValueObject::class,
    ])
    ->withExceptions(function (Exceptions $exceptions): void {
        //
        
    })->create(
        
    );
    
