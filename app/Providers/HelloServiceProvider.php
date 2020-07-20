<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Validator;
use App\Http\Validators\HelloValidator;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // HelloComposerを呼び出す
        View::composer('hello.index', 'App\Http\Composers\HelloComposer');

        // HelloValidatorを呼び出す
        // $validator = $this->app['validator'];
        // $validator->resolver(function($translator, $data, $rules, $messages){
        //     return new HelloValidator($translator, $data, $rules, $messages);
        // });

        // Validator::extendを使用して直接サービスプロバイダーに追加する方法（1つのコントローラでしか使わないような場合に使う方法）
        Validator::extend('hello', function($attribute, $value, $parameters, $validator) {
            return $value % 2 == 0;
        });
    }
}
