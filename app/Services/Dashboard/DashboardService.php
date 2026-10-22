<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\DashboardContract;
use App\Services\Dashboard\DashboardInterface;

class DashboardService implements DashboardInterface
{
    public $dashboardContract;
    public function __construct(DashboardContract $dashboardContract)
    {
        $this->dashboardContract = $dashboardContract;
    }
    public function index()
    {
        return $this->dashboardContract->index();
    }
}
