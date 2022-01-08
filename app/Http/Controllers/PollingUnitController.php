<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PollingUnit;

class PollingUnitController extends Controller
{
    public function index()
    {
        $pollingUnits = PollingUnit::get();
        $data = ["pollingUnits" => $pollingUnits];

        return view('dashboard', $data);
    }
}
