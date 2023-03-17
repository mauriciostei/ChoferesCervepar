<?php

namespace App\Http\Controllers;

use App\Models\Choferes;
use App\Models\Moviles;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $chofer = Choferes::where('documento', Auth::user()->document)->first();
        $chofer->planes;

        return view('Planes.Home', [
            'chofer' => $chofer,
            'movil' => new Moviles()
        ]);
    }
}
