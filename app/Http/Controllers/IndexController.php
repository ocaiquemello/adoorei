<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\TrackingCode;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Index');
    }

    public function store(Request $request)
    {
        $TrackingCode = new TrackingCode();

        $TrackingCode->tracking_code = $request->tracking_code;

        $TrackingCode->save();
    }

    public function get()
    {
        $TrackingCode = new TrackingCode();

        $tracking = $TrackingCode->all();

        return $tracking;
    }

    public function getSingle($tracking_code)
    {
        $TrackingCode = new TrackingCode();

        $tracking = $TrackingCode::where('tracking_code', $tracking_code)->first();

        return $tracking;
    }
}
