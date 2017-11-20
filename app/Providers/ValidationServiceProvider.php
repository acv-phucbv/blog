<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('format_date', function ($attribute, $value, $parameters, $validator) {
            if (!empty($value)) {
                $value = str_replace(['/', '_'], '', $value);
                if ( !(strlen($value) == 8)) {
                    return false;
                } else {
                    $date = \Carbon\Carbon::createFromFormat('dmY', $value)->format('dmY');
                    return $date === $value;
                }
            } else return true;
        }, trans('validation.format_date'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
