<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Tarjeta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BeneficiariosController extends Controller
{
    public function index(Request $request){
        $query = Beneficiario::query();

        if($request->has('searchUser')){
            $search = $request->searchUser;
            $query->where('nombre_beneficiario', 'LIKE', "%$search%")
                ->orWhere('aPaterno_beneficiario', 'LIKE', "%$search")
                ->orWhere('aMaterno_beneficiario', 'LIKE', "%$search")
                ->orWhereHas('tarjeta', function ($q) use ($search){
                    $q->where('numero_tarjeta', 'LIKE', "%$search%");
                })
                ->orWhereHas('tarjeta', function ($q) use ($search){
                    $q->where('numeroToma_tarjeta', 'LIKE', "%$search%");
                });
        }
        $beneficiarios = $query->with('tarjeta')->paginate();

        $totaltipos = Tarjeta::select('tipoUsuario_tarjeta')->selectRaw('count(*) as total')->groupBy('tipoUsuario_tarjeta')->get();

        $totalcolonias = Beneficiario::select('colonia_beneficiario')->selectRaw('count(*) as total')->groupBy('colonia_beneficiario')->get();

        $totalUsuarios = Beneficiario::count();

        return view('beneficiarios.index', compact('beneficiarios', 'totaltipos', 'totalcolonias', 'totalUsuarios'));
    }

    public function create(){
        return view('beneficiarios.form');
    }

    public function store(Request $request){
        $request->validate([
            'noTarjeta' => 'required|min:5|max:50|unique:tarjetas,numero_tarjeta',
            'noToma' => 'required|min:1',
            'name' => 'required|min:3|max:50',
            'isTitular' => 'boolean',
            'aPaterno' => 'required|min:3|max:50',
            'aMaterno' => 'required|min:3|max:50',
            'meses' => 'required|integer|min:1',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'direccion' => "required|min:5|max:100",
            'colonia' => 'required|not_in:0',
            'userType' => 'required|not_in:0'
        ]);
        
        if($request->isTitular){
            $existTitular = Beneficiario::whereHas('tarjeta', function($query) use ($request){
                $query->where('numeroToma_tarjeta', $request->noToma);
            })->where('isTitular_beneficiario', true)->exists();

            if($existTitular){
                return back()->withErrors(['isTitular' => 'Esta toma ya tiene un titular.']);
            }
        }

        $beneficiario = new Beneficiario();
        $tarjeta = new Tarjeta();

        $beneficiario->nombre_beneficiario = $request->name;
        $beneficiario->aPaterno_beneficiario = $request->aPaterno;
        $beneficiario->aMaterno_beneficiario = $request->aMaterno;
        $beneficiario->longitud_beneficiario = $request->longitude;
        $beneficiario->latitud_beneficiario = $request->latitude;
        $beneficiario->direccion_beneficiario = $request->direccion;
        $beneficiario->isTitular_beneficiario = $request->has('isTitular');
        
        switch($request->colonia){
            case 1: 
                $beneficiario->colonia_beneficiario = 'Centro';
                break;
            case 2:
                $beneficiario->colonia_beneficiario = 'Emiliano Zapata';
                break;
            case 3:
                $beneficiario->colonia_beneficiario = 'Barrio Santa Cruz';
                break;
            case 4:
                $beneficiario->colonia_beneficiario = 'Vista Hermosa';
                break;
            default:
                $beneficiario->colonia_beneficiario = 'No se selecciono colonia';
        }
        
        $beneficiario->save();
        
        $tarjeta->id_beneficiario = $beneficiario->id_beneficiario;
        $tarjeta->numero_tarjeta = $request->noTarjeta;
        $tarjeta->numeroToma_tarjeta = $request->noToma;
        $tarjeta->mesesPendientes_tarjeta = $request->meses;
        if($request->meses != 0){
            $tarjeta->proximoPago_tarjeta = Carbon::today()->subMonthNoOverflow($request->meses);
        }
        else{
            $tarjeta->proximoPago_tarjeta = Carbon::today()->addMonthNoOverflow();
        }
        
        switch($request->userType){
            case 1:
                $tarjeta->tipoUsuario_tarjeta = 'Jefe de familia';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            case 2:
                $tarjeta->tipoUsuario_tarjeta = 'Padre soltero';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            case 3:
                $tarjeta->tipoUsuario_tarjeta = 'Madre soltera';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            case 4:
                $tarjeta->tipoUsuario_tarjeta = 'Adulto mayor';
                $tarjeta->monto_tarjeta = 0.0;
                break;
            case 5:
                $tarjeta->tipoUsuario_tarjeta = 'Voluntario';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            default:
                $tarjeta->tipoUsuario_tarjeta = 'Voluntario';
                $tarjeta->monto_tarjeta = 50.0;
                break;
        }
                
        $tarjeta->save();
                
        return redirect(route('beneficiarios.index'));
    }
            
    public function edit($beneficiario){
                
        $beneficiario = Beneficiario::where('id_beneficiario', $beneficiario)->with('tarjeta')->first();
            
        return view('beneficiarios.edit', compact('beneficiario'));
    }

    public function update(Request $request, $beneficiario){

        $beneficiario = Beneficiario::find($beneficiario);
        $tarjeta = Tarjeta::where('id_beneficiario', $beneficiario->id_beneficiario)->first();

        $request->validate([
            'noTarjeta' => "required|min:5|max:50|unique:tarjetas,numero_tarjeta,{$tarjeta->id_tarjeta},id_tarjeta",
            'noToma' => 'required|min:1',
            'name' => 'required|min:3|max:50',
            'isTitular' => 'boolean',
            'aPaterno' => 'required|min:3|max:50',
            'aMaterno' => 'required|min:3|max:50',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'direccion' => "required|min:5|max:100",
            'colonia' => 'required|not_in:0',
            'userType' => 'required|not_in:0'
        ]);
        if($request->isTitular){
            $existTitular = Beneficiario::whereHas('tarjeta', function($query) use ($request){
                $query->where('numeroToma_tarjeta', $request->noToma);
            })->where('isTitular_beneficiario', true)->exists();

            if($existTitular){
                return back()->withErrors(['isTitular' => 'Esta toma ya tiene un titular.']);
            }
        }

        $beneficiario->nombre_beneficiario = $request->name;
        $beneficiario->aPaterno_beneficiario = $request->aPaterno;
        $beneficiario->aMaterno_beneficiario = $request->aMaterno;
        $beneficiario->longitud_beneficiario = $request->longitude;
        $beneficiario->latitud_beneficiario = $request->latitude;
        $beneficiario->direccion_beneficiario = $request->direccion;
        $beneficiario->isTitular_beneficiario = $request->has('isTitular');

        switch($request->colonia){
            case 1: 
                $beneficiario->colonia_beneficiario = 'Centro';
                break;
            case 2:
                $beneficiario->colonia_beneficiario = 'Emiliano Zapata';
                break;
            case 3:
                $beneficiario->colonia_beneficiario = 'Barrio Santa Cruz';
                break;
            case 4:
                $beneficiario->colonia_beneficiario = 'Vista Hermosa';
                break;
            default:
                $beneficiario->colonia_beneficiario = 'No se selecciono colonia';
        }

        $beneficiario->save();
        
        $tarjeta->numero_tarjeta = $request->noTarjeta;
        $tarjeta->numeroToma_tarjeta = $request->noToma;
        
        switch($request->userType){
            case 1:
                $tarjeta->tipoUsuario_tarjeta = 'Jefe de familia';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            case 2:
                $tarjeta->tipoUsuario_tarjeta = 'Padre soltero';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            case 3:
                $tarjeta->tipoUsuario_tarjeta = 'Madre soltera';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            case 4:
                $tarjeta->tipoUsuario_tarjeta = 'Adulto mayor';
                $tarjeta->monto_tarjeta = 0.0;
                break;
            case 5:
                $tarjeta->tipoUsuario_tarjeta = 'Voluntario';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            default:
                $tarjeta->tipoUsuario_tarjeta = 'Voluntario';
                $tarjeta->monto_tarjeta = 50.0;
                break;
        }

        $tarjeta->save();

        return redirect(route('beneficiarios.index'));
    }

    public function destroy($beneficiario){

        $beneficiario = Beneficiario::find($beneficiario);
        $beneficiario->delete();

        return redirect(route('beneficiarios.index'));
    }
}
