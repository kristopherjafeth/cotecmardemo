<?php

namespace App\Http\Controllers;

use App\Models\Bloque;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $countProjects = Proyecto::all()->count();
        $countBloques= Bloque::all()->count();

        return Inertia::render('Dashboard', ['countProjects' => $countProjects, 'countBloques' => $countBloques ]);
    }
}
