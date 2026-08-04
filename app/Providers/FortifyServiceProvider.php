<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

use Laravel\Fortify\Fortify;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;

use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;

use Laravel\Fortify\Http\Responses\LoginViewResponse as LoginViewResponseImpl;
use Laravel\Fortify\Http\Responses\RegisterViewResponse as RegisterViewResponseImpl;

class FortifyServiceProvider extends ServiceProvider
{

    public function register(): void
    {

        $this->app->singleton(
            LoginViewResponse::class,
            function () {
                return new LoginViewResponseImpl();
            }
        );


        $this->app->singleton(
            RegisterViewResponse::class,
            function () {
                return new RegisterViewResponseImpl();
            }
        );

    }


    public function boot(): void
    {

        Fortify::createUsersUsing(CreateNewUser::class);


        Fortify::updateUserProfileInformationUsing(
            UpdateUserProfileInformation::class
        );


        Fortify::updateUserPasswordsUsing(
            UpdateUserPassword::class
        );


        Fortify::resetUserPasswordsUsing(
            ResetUserPassword::class
        );


        Fortify::redirectUserForTwoFactorAuthenticatableUsing(
            RedirectIfTwoFactorAuthenticatable::class
        );


        Fortify::loginView(function () {

            return view('auth.login');

        });


        Fortify::registerView(function () {

            return view('auth.register');

        });



        RateLimiter::for('login', function (Request $request) {

            $throttleKey = Str::transliterate(
                Str::lower(
                    $request->input(Fortify::username())
                )
                .'|'.$request->ip()
            );


            return Limit::perMinute(5)
                ->by($throttleKey);

        });



        RateLimiter::for('two-factor', function (Request $request) {

            return Limit::perMinute(5)
                ->by(
                    $request->session()->get('login.id')
                );

        });

    }
}