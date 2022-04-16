<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('recaptcha', function () {
            $siteKey = '6Ld1WDsfAAAAAB7DFDKnVoex6tE3O-k_qjjbb5fq';//TODO move to config
            return '
                <div id="g-recaptcha" class="g-recaptcha" data-sitekey="'.$siteKey.'"></div>
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            ';
        });
    }
}
