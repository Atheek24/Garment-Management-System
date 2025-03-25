<?php

namespace App\Providers;

use App\Models\Garment;
use App\Models\Machine;
use App\Models\Customer;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        
    }

    public function boot(): void
    {
        View::composer(['*'], function ($view) {
            $view->with('total_customers', Customer::count());
            $view->with('active_customers', Customer::where('status', 1)->count());
        });
        
        View::composer(['*'], function ($view) {
            $view->with('total_machines', Machine::count());
            $view->with('inactive_machines', Machine::where('status', 0)->count());
        });

        View::composer(['*'], function ($view) {
            $garmentCategories = DB::table('garments')
                ->select('category', DB::raw('COUNT(*) as count'))
                ->groupBy('category')
                ->pluck('count', 'category');

            $view->with('garmentCategories', $garmentCategories);
        });

        View::composer(['*'], function ($view) {
            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];

            $completedOrders = DB::table('orders')
            ->selectRaw("MONTHNAME(order_date) AS month, MONTH(order_date) AS month_num, COUNT(*) AS count")
            ->where('status', 'Completed')
            ->groupBy('month', 'month_num')
            ->orderBy('month_num')
            ->pluck('count', 'month')
            ->toArray();

            $cancelledOrders = DB::table('orders')
            ->selectRaw("MONTHNAME(order_date) AS month, MONTH(order_date) AS month_num, COUNT(*) AS count")
            ->where('status', 'Cancelled')
            ->groupBy('month', 'month_num')
            ->orderBy('month_num')
            ->pluck('count', 'month')
            ->toArray();

            $completedData = [];
            $cancelledData = [];
            foreach ($months as $month) {
                $completedData[] = $completedOrders[$month] ?? 0;
                $cancelledData[] = $cancelledOrders[$month] ?? 0;
            }

            $view->with('months', $months);
            $view->with('completedData', $completedData);
            $view->with('cancelledData', $cancelledData);
        });
    }
}
