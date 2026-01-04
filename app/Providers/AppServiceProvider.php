<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\backend\FoodItem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $latestItem = FoodItem::latest()->first();
            $img = null;
            if ($latestItem && $latestItem->images) {
                $images = json_decode($latestItem->images);
                $img = $images[0] ?? null;
            }
            $view->with('img', $img);
        });
    }
}
