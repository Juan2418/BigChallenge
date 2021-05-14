<?php

namespace App\Http\Controllers\Admin\Charts;

use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class MonthlyOrdersChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MonthlyOrdersChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        $labels = [];
        for ($days_backwards = 15; $days_backwards >= 0; $days_backwards--) {
            if ($days_backwards == 1) {
            }
            $labels[] = $days_backwards.' days ago';
        }
        $this->chart->labels($labels);


        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/monthly-orders'));

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
        $ordersInThePastMonth = array(31);
        for ($daysBack = 15; $daysBack >= 0; $daysBack--) {
            $ordersInThePastMonth[] = \App\Models\Order::whereDate('created_at', today()->subDays($daysBack))->count();
        }

        $this->chart->dataset('Orders Created', 'line',
            $ordersInThePastMonth
        )
            ->color('rgba(205, 32, 31, 1)')
            ->backgroundColor('rgba(205, 32, 31, 0.4)');
    }
}
