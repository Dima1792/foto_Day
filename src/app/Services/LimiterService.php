<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class LimiterService
{
    public function checkLimite(string $key, int $maxAttempts = 2, int $second = 60)
    {
        if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            $seconds = RateLimiter::availableIn($key);

            throw new HttpResponseException(response()->json([
                'message' => "Слишком много запросов. Подождите {$seconds} сек."
            ], 429));

            RateLimiter::hit($key, $decaySeconds);
        }
    }
}
