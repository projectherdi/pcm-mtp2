<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * PERBAIKAN: Kode ini harus berada di dalam fungsi register.
         * Ini memberitahu Laravel bahwa folder publik Anda telah berpindah
         * ke public_html/public agar aset (CSS/JS) terbaca dengan benar.
         */
        $this->app->bind('path.public', function () {
            return base_path('../public_html/public');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}