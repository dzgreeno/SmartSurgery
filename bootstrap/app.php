<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Vercel Serverless Storage Override
|--------------------------------------------------------------------------
| Vercel uses a highly restrictive read-only file system. We must override
| the default storage path to use the writable /tmp directory.
*/
if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL'])) {
    $app->useStoragePath('/tmp/storage');
    // Ensure critical directories exist
    if (!is_dir('/tmp/storage/framework/views')) @mkdir('/tmp/storage/framework/views', 0777, true);
    if (!is_dir('/tmp/storage/framework/cache/data')) @mkdir('/tmp/storage/framework/cache/data', 0777, true);
    if (!is_dir('/tmp/storage/framework/sessions')) @mkdir('/tmp/storage/framework/sessions', 0777, true);
    if (!is_dir('/tmp/storage/logs')) @mkdir('/tmp/storage/logs', 0777, true);
}

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
