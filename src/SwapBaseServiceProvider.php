<?php


namespace nbmod\swap;


use Illuminate\Support\ServiceProvider;

class SwapBaseServiceProvider extends ServiceProvider
{
    public function boot(){

    }
    public function register(){
        include __DIR__.'/S3.php';
    }

}