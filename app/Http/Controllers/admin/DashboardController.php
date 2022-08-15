<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\DashboardRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private DashboardRepositoryInterface $dashboardRepository;

    public function __construct(DashboardRepositoryInterface $dashboardRepository) 
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function index(Request $request)
    {
        return view('admin.pages.dashboard', 
            ["data" => $this->dashboardRepository->detailDashboard($request->all())]
        );
    }
}
