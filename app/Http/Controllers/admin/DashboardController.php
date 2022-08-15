<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Interfaces\admin\DashboardRepositoryInterface;
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
        $data = $this->dashboardRepository->detailDashboard($request->all());
        return view('admin.pages.dashboard', compact('data'));
    }
}
