<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TelemetryController extends Controller
{
    public function ddss()
    {
        try {
            $count = DB::connection('ddss_system')->table('student_predictions')->count();
            return response()->json([
                'status' => 'online',
                'count' => $count,
                'label' => 'Profiles Evaluated'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'offline',
                'count' => '--',
                'label' => 'Profiles Evaluated'
            ]);
        }
    }

    public function smartmed()
    {
        try {
            $count = DB::connection('smartmed_system')->table('patient_meta')->count();
            return response()->json([
                'status' => 'online',
                'count' => $count,
                'label' => 'Patient Records'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'offline',
                'count' => '--',
                'label' => 'Patient Records'
            ]);
        }
    }

    public function rosaflora()
    {
        try {
            $count = DB::connection('rosaflora_system')->table('tblappointment')->count();
            return response()->json([
                'status' => 'online',
                'count' => $count,
                'label' => 'Active Reservations'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'offline',
                'count' => '--',
                'label' => 'Active Reservations'
            ]);
        }
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Message received!'
        ]);
    }
}