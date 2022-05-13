<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });

        Blade::directive('datetime', function ($expression) {
            $a = "<?php echo ($expression)->format('l, d F Y'); ?>";
            return $a;
            // return Carbon::parse($expression)->translatedFormat('l, d F Y');
        });
        Blade::directive('datewithtime', function ($expression) {
            $a = "<?php echo ($expression)->format('l, d F Y - h:i'); ?>";
            return $a;
            // return Carbon::parse($expression)->translatedFormat('l, d F Y');
        });
        Blade::directive('dateonly', function ($expression) {
            $a = "<?php echo ($expression)->format('d F Y'); ?>";
            return $a;
            // return Carbon::parse($expression)->translatedFormat('l, d F Y');
        });
        Blade::directive('date', function ($expression) {
            $a = "<?php echo ($expression)->format('d'); ?>";
            return $a;
            // return Carbon::parse($expression)->translatedFormat('l, d F Y');
        });
        Blade::directive('month', function ($expression) {
            $a = "<?php echo ($expression)->format('F'); ?>";
            return $a;
            // return Carbon::parse($expression)->translatedFormat('l, d F Y');
        });
    }
}
