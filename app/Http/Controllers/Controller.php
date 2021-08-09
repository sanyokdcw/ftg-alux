<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function check_session(): void
    {
        if(session()->has('locale')) {
            $locale = session('locale');
            App::setLocale($locale);
        }
        else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }
    }
}
