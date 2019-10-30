<?php

namespace App\Providers;
use App\Customer;
use App\Loan;
use App\Payment;
use function foo\func;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('admin.layout.layout',function ($view){
            $view->with('customers', Customer::counts());
            $view->with('loans', Loan::counts());
            $view->with('payments', Payment::counts());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
