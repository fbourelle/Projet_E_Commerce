<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider{

  public function boot(){
    Validator::extend('aaaa', function($value) {
      return $value == 'aaaa';
    });
  }

  public function register(){

  }
}
