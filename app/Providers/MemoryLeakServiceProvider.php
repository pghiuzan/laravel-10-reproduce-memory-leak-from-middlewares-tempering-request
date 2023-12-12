<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Middleware\TrimStrings;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Illuminate\Support\ServiceProvider;

class MemoryLeakServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        parent::register();

        TrimStrings::skipWhen(fn (): bool => (bool) sleep(1));
        ConvertEmptyStringsToNull::skipWhen(fn (): bool => false);
    }
}
