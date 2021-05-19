<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\Order;
use App\Http\Controllers\PopularityController;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class WeeklyPopularProductChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WeeklyPopularProductChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels(PopularityController::names());

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/weekly-popular-product'));

        // OPTIONAL
        // $this->chart->minimalist(false);
        // $this->chart->displayLegend(true);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
     public function data()
     {
         $incomeInTheLastWeek = PopularityController::totalOrderCount();

         $this->chart->dataset('products', 'pie',
             $incomeInTheLastWeek
         )
             ->color('rgba(205, 32, 31, 1)')
             ->backgroundColor('rgba(205, 32, 31, 0.4)');
     }
}
