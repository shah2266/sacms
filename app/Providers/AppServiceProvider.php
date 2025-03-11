<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\Hero;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Schema;
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
        $menuItems = [];
        $company = null;
        $latestMessages = [];
        $footer = null;

        if(Schema::hasTable('menu_items')) {
            $menuItems = MenuItem::with('parent')->where('status', 1)->orderBy('order')->get();
        }

        if(Schema::hasTable('companies')) {
            $company = Company::where('status', 1)->first();
        }

        if(Schema::hasTable('contacts')) {
            $latestMessages = Contact::latest()->limit(2)->get();
        }

        if(Schema::hasTable('footers')) {
            $footer = Footer::where('is_active', true)->first();
        }

        view()->share([
            'menuItems' => $menuItems,
            'company' => $company,
            'latestMessages' => $latestMessages,
            'footer' => $footer
        ]);
    }
}
