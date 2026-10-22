<?php

namespace App\Http\Controllers;

use App\Services\Dashboard\DashboardInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $dashboardInterface;
    public function __construct(DashboardInterface $dashboardInterface)
    {
        $this->dashboardInterface = $dashboardInterface;
    }
    public function index()
    {
        try {
            $data = $this->dashboardInterface->index();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
