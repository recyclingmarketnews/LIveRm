<?php

namespace App\Providers;

use View;

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
        //  ///FOr OIL
        // // set API Endpoint and API key 
        // $endpoint = 'latest';
        // $access_keyy = '3u8xrcims9any5xc8f2ccehsmgc1gxm317syx2y4apk8gh41y237exupj2cp';
        
        // // Initialize CURL:
        // $ch1 = curl_init('https://www.commodities-api.com/api/'.$endpoint.'?access_key='.$access_keyy.'&base=barrel&symbols=RICE%2CWHEAT%2CSUGAR%2CCORN%2CWTIOIL%2CBRENTOIL%2CSOYBEAN%2CCOFFEE%2CXAU%2CXAG%2CXPD%2CXPT%2CXRH%2CRUBBER%2CETHANOL%2CCPO%2CNG');
        // curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        
        // // Store the data:
        // $json1 = curl_exec($ch1);
        // curl_close($ch1);
        
        // // Decode JSON response:
        // $exchangeRatesOil = json_decode($json1, true);
        // $exchangeRatesOil = $exchangeRatesOil['data']['rates'];
        
        // View::share('exchangeRatesOil',$exchangeRatesOil);
    }
}
