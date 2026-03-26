<?php
use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;

class DashboardCharts extends Component
{
    public function getSalesData()
    {
        return Order::query()
            ->selectRaw('DATE(created_at) as date, SUM(total) as total')
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard-charts', [
            'sales' => $this->getSalesData(),
        ]);
    }
}
