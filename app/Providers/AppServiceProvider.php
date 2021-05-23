<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');

        Blade::directive('date', function ($param) {
            return "<?= \Carbon\Carbon::parse($param)->translatedFormat('d F Y'); ?>";
        });
        
        Blade::directive('month', function ($param) {
            return "<?= \Carbon\Carbon::parse($param)->translatedFormat('F Y'); ?>";
        });

        //mata uang
        Blade::directive('currency', function($exp){
            return "Rp. <?= number_format($exp, 0, ',', '.'); ?>";
        });
    }
}
