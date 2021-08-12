<?php

namespace App\Http\Middleware;

use App\Services\CurrencyService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CheckCurrencyMiddleware
{
    private $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $currencies = $this->currencyService->updateCurrencies();

        $rub = $currencies->rub;
        $usd = $currencies->usd;

        View::share(['rub' => $rub, 'usd' => $usd]);

        return $next($request);
    }
}
