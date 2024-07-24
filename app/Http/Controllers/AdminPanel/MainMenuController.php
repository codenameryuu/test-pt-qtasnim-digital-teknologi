<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;

class MainMenuController extends Controller
{
    /**
     ** Index.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return view('main_menu.index');
    }
}
