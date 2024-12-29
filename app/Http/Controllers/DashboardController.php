<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $roleId = auth()->user()->role_id;

        switch ($roleId) {
            case 1:
                return view('admin.dashboard');
            case 2:
                return view('rw.dashboard');
            case 3:
                return view('rt.dashboard');
            case 4:
                return view('warga.dashboard');
            default:
                return abort(403, 'Unauthorized');
        }
    }
}


