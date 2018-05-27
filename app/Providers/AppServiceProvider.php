<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Blade;
use App\Models\Category;

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

        // On crée une directive admin comme ça on pourra ainsi écrire @admin dans les vues !
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role === 'admin';
        });

        // La méthode share permet le partage de données pour toutes les vues. 
        // J’inclus ce code dans une condition pour vérifier qu’on est pas avec une commande artisan. 
        //En effet si vous lancez une commande de migration vous n’avez pas encore les catégories et vous aurez forcément une erreur.
        if(request()->server("SCRIPT_NAME") !== 'artisan') {
            view ()->share ('categories', Category::all ());
        }
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
