<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     ** Index.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return view('dashboard.index');
    }
}
