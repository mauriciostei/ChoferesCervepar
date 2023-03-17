<?php

namespace App\Http\Controllers;

use App\Http\Requests\Planes\PlanesUpdate;
use App\Models\Choferes;
use App\Models\Moviles;
use App\Models\Planes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlanesController extends Controller
{
    public function form($viaje){
        $chofer = Choferes::where('documento', Auth::user()->document)->first();

        $planes = Planes::latest()->first();
        $excluir = DB::connection('pgsqlDash')->table('choferes_moviles_planes')->where('planes_id', $planes->id)->where('viaje', $viaje)->get('moviles_id')->toArray();
        $ex = [];
        foreach($excluir as $e){
            array_push($ex, $e->moviles_id);
        }
        $moviles = Moviles::whereNotIn('id', $ex)->get();

        return view('Planes.form', [
            'chofer' => $chofer,
            'planes' => $planes,
            'moviles' => $moviles,
            'viaje' => $viaje
        ]);
    }

    public function guardarCambios(PlanesUpdate $request){
        $existe = DB::connection('pgsqlDash')->table('choferes_moviles_planes')->where('planes_id', $request->planes_id)->where('choferes_id', $request->choferes_id)->where('viaje', $request->viaje)->first();
        if($existe){
            DB::connection('pgsqlDash')->table('choferes_moviles_planes')->where('planes_id', $request->planes_id)->where('choferes_id', $request->choferes_id)->where('viaje', $request->viaje)->update(['moviles_id' => $request->moviles_id]);
        }else{
            DB::connection('pgsqlDash')->table('choferes_moviles_planes')->insert(['planes_id' => $request->planes_id, 'choferes_id' => $request->choferes_id, 'viaje' => $request->viaje, 'moviles_id' => $request->moviles_id]);
        }

        return redirect()->to('home');
    }
}
