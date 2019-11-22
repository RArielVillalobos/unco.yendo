<?php

namespace App\Providers;

use App\Mail\RequestSend;
use App\Mail\UserCreated;
use App\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
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
        //cuando se genera un usuario, se tiene que enviar un email
        User::created(function ($user){
            Mail::to($user)->send(new UserCreated($user));

        });

        Request::created(function($request){
            Mail::to($request->trip->user->email)->send(new RequestSend($request));
        });
    }
}
