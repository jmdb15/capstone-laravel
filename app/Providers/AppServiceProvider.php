<?php

namespace App\Providers;

use App\Models\Users;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('title', 'CSSP Rajah');
        // View::composer('students.index', function($view){
        //     $view->with('students', Users::all());
        // });
    }
}
