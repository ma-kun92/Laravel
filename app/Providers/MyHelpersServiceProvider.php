<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyHelpersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function register()
    {
      foreach (glob(sprintf('%s/MyHelpers/*.php', app_path())) as $helper_file){
        require_once($helper_file);
      }
    }
}
