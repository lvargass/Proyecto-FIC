<?php

namespace App\Http\Controllers;

use App\Models\CombinationTable;
use App\Models\Comunas;
use App\Models\Processes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormalizeController extends Controller
{
    //
    public function index(Request $request, $id) {
        // Obteniendo el proceso
        $process = Processes::where('user_id', Auth::user()->id)->where('id', $id)->first();
        // Verificando que el usuario es dueño de este proceso y que ademas el proceso exista
        if ($process === null) return redirect()->route('dashboard')->with([ 'process'  =>  'El proceso seleccionado no existe.' ]);
        // Obteniendo la lista de documentos requeridos
        $listDocuments = CombinationTable::where('rubro_id', $process->rubro_id)->where('comuna_id', $process->comuna_id)->first();
        return view('formalize', [
            'process' => $process,
            'comunas' => Comunas::all(),
            'listDocuments' => json_decode($listDocuments->list_documents, true)
        ]);
    }

    public function completeProcess(Request $request, $id) {
        // Validando los parametros requeridos
        $request->validate([
            'companyName' =>  'required',
            'street' => 'required',
            'village' => 'required',
            'comuna' => 'required',
            'number' => 'required',
            'block' => 'required',
            'department' => 'required',
            'object' => 'required',
            'totalAmount' => 'required',
            'typeCurrency' => 'required',
            'durationCompany' => 'required',
            'administrationFor' => 'required',
            'administrationPowers' => 'required',
            'file-upload-0' => 'required',
            'file-upload-1' => 'required',
            'file-upload-2' => 'required',
        ]);
        // Actualizando el proceso y pasandolo al estado de procesando
        $process = Processes::find($id);
        // Verificando que el proceso exista
        $process->company_name = $request->companyName;
        $process->company_name_fantasy = $request->companyNameFantasy;
        $process->street = $request->street;
        $process->village = $request->village;
        $process->comuna = $request->comuna;
        $process->number = $request->number;
        $process->block = $request->block;
        $process->department = $request->department;
        $process->company_object = $request->object;
        $process->company_capital = $request->totalAmount;
        $process->type_currency = $request->typeCurrency;
        $process->company_duration = $request->durationCompany;
        // $process->administration_for = $request->administrationFor;
        $process->administration_powers = $request->administrationPowers;
        $process->status = 'PROCESANDO';
        // Guardando la informacion
        if ($process->save()) {
            return redirect()->route( 'dashboard' );
        }

        dd($request->all());
    }
}
