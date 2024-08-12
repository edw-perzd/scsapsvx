<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Tarjeta;
use Illuminate\Http\Request;

class BeneficiariosController extends Controller
{
    public function index(){
        $beneficiarios = Beneficiario::with('tarjeta')->get();
        return view('beneficiarios.index', compact('beneficiarios'));
    }

    public function create(){
        return view('beneficiarios.form');
    }

    public function store(Request $request){
        $beneficiario = new Beneficiario();
        $tarjeta = new Tarjeta();

        $beneficiario->nombre_beneficiario = $request->name;
        $beneficiario->aPaterno_beneficiario = $request->aPaterno;
        $beneficiario->aMaterno_beneficiario = $request->aMaterno;
        $beneficiario->longitud_beneficiario = $request->longitude;
        $beneficiario->latitud_beneficiario = $request->latitude;
        $beneficiario->direccion_beneficiario = $request->direccion;
        $beneficiario->colonia_beneficiario = $request->colonia;

        $beneficiario->save();
        
        $tarjeta->id_beneficiario = $beneficiario->id_beneficiario;
        $tarjeta->numero_tarjeta = $request->noTarjeta;
        $tarjeta->mesesPendientes_tarjeta = 0;
        
        switch($request->userType){
            case '1':
                $tarjeta->tipoUsuario_tarjeta = 'Jefe de familia';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            case '2':
                $tarjeta->tipoUsuario_tarjeta = 'Padre soltero';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            case '3':
                $tarjeta->tipoUsuario_tarjeta = 'Madre soltera';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            case '4':
                $tarjeta->tipoUsuario_tarjeta = 'Adulto mayor';
                $tarjeta->monto_tarjeta = 0.0;
                break;
            case '5':
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

        $beneficiario->nombre_beneficiario = $request->name;
        $beneficiario->aPaterno_beneficiario = $request->aPaterno;
        $beneficiario->aMaterno_beneficiario = $request->aMaterno;
        $beneficiario->longitud_beneficiario = $request->longitude;
        $beneficiario->latitud_beneficiario = $request->latitude;
        $beneficiario->direccion_beneficiario = $request->direccion;
        $beneficiario->colonia_beneficiario = $request->colonia;

        $beneficiario->save();
        
        $tarjeta->numero_tarjeta = $request->noTarjeta;
        
        switch($request->userType){
            case '1':
                $tarjeta->tipoUsuario_tarjeta = 'Jefe de familia';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            case '2':
                $tarjeta->tipoUsuario_tarjeta = 'Padre soltero';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            case '3':
                $tarjeta->tipoUsuario_tarjeta = 'Madre soltera';
                $tarjeta->monto_tarjeta = 50.0;
                break;
            case '4':
                $tarjeta->tipoUsuario_tarjeta = 'Adulto mayor';
                $tarjeta->monto_tarjeta = 0.0;
                break;
            case '5':
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
