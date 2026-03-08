<?php

namespace App\Services;

use App\Exceptions\LimiteException;
use Illuminate\Support\Facades\RateLimiter;

class LimiterService
{
    public function checkLimite(string $key, int $maxAttempts = 2, int $second = 60)
    {
        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);
            throw new LimiteException($seconds);
        }
        RateLimiter::hit($key);

    }
}
