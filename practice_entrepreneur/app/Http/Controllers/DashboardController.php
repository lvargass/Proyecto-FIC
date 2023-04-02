<?php

namespace App\Http\Controllers;

use App\Models\Comunas;
use App\Models\Rubros;
use App\Models\Processes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(Request $request) {
        // Obteniendo todas las comunas y rubros
        return view('dashboard', [
            'comunas' => Comunas::all(),
            'rubros' => Rubros::all(),
            'processes' => Processes::where('user_id', Auth::user()->id)->paginate(5),
        ]);
    }

    public function createProcess(Request $request) {
        $request->validate([
            'question1' =>  'required',
            'question2' =>  'required',
            'question3' =>  'required',
        ]);

        $process = new Processes;

        $process->user_id = Auth::user()->id;
        $process->name = $request->question1;
        $process->rubro_id = $request->question2;
        $process->comuna_id = $request->question3;

        if ($process->save()) {
            return redirect()->route('formalize', [
                'id'=>$process->id
            ]);
        }

        return 'error saved';
    }
}
