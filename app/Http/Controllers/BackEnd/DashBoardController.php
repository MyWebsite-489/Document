<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * @return View
 */
class DashBoardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard.index');
    }
}
