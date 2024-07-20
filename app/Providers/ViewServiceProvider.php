<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Contact;

class ViewServiceProvider extends ServiceProvider
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
        // Use the View facade to share the contacts data with all views
        View::composer('*', function ($view) {
            $contacts = Contact::orderBy('created_at', 'desc')->get();
            $unreadMessagesCount = Contact::where('read', false)->count();
            $view->with(compact('contacts', 'unreadMessagesCount'));
        });
    }
}
