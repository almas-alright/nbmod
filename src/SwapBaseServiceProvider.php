<?php


namespace nbmod\swap;


use Illuminate\Support\ServiceProvider;

class SwapBaseServiceProvider extends ServiceProvider
{
    public function boot(){

    }
    public function register(){
        if (file_exists($file = app_path('src/S3.php'))) {
            require $file;
        }
    }

}