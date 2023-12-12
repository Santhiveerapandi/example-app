<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

//Laravel Log
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
//Query Log
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

//Date&time
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        //Query logger in laravel
        DB::listen(function(QueryExecuted $query) {
            File::append(
                storage_path('/logs/query.log'),
                '[ '.Carbon::now()->toDateTimeString().' ] : '.$query->sql . ' [' . implode(', ', $query->bindings) . ']' . '[' . $query->time . ']' . PHP_EOL
           );
        });
        //Laravel Log
        Log::shareContext([
            'invocation-id' => (string) Str::uuid(),
        ]);
    }
}
