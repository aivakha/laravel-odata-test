<?php

namespace App\Http\Controllers;

use App\Services\API\CashCheckService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
