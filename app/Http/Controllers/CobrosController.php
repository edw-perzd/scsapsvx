<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarjeta;
use App\Models\Beneficiario;
use App\Models\Pago;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

Carbon::setLocale('es');

class CobrosController extends Controller
{
    public function index(Request $request){
        $query = Beneficiario::query();

        switch ($request->filtro) {
            case '2':
                $query->whereHas('tarjeta', function ($q){
                    $q->where('mesesPendientes_tarjeta', '>', 0);
                });
                break;
            case '3':
                $query->whereHas('tarjeta', function ($q){
                    $q->where('mesesPendientes_tarjeta', '<', 1);
                });
                break;
            default:
                break;
        }

        $beneficiarios = $query->with('tarjeta')->paginate();

        foreach($beneficiarios as $beneficiario){
            $tarjeta = Tarjeta::where('id_beneficiario', $beneficiario->id_beneficiario)->first();
            $tarjeta->mesesPendientes_tarjeta = Carbon::parse($tarjeta->proximoPago_tarjeta)->diffInMonths(Carbon::today()) + 1;
            $tarjeta->save();
        }

        return view('cobros.index', compact('beneficiarios'));
    }

    public function show($beneficiario){

        $fechas = [];

        $beneficiario = Beneficiario::where('id_beneficiario', $beneficiario)->with('tarjeta')->first();

        $fechaProxima = Carbon::parse($beneficiario->tarjeta->proximoPago_tarjeta);

        while($fechaProxima <= Carbon::today()){

            array_push($fechas, $fechaProxima->format('M Y'));
            
            $fechaProxima->addMonth();
        }

        return view('cobros.target', compact('beneficiario', 'fechas'));
    } 

    public function pagar(Request $request, $beneficiario){
        $tarjeta = Tarjeta::where('id_beneficiario', $beneficiario)->first();
        $pago = new Pago();

        $pago->id_tarjeta = $tarjeta->id_tarjeta;
        $validatedData = $request->validate([
            'meses' => 'required|array|min:1',
        ]);

        $pago->meses_pago = count($validatedData['meses']);

        $tarjeta->proximoPago_tarjeta = Carbon::parse($tarjeta->proximoPago_tarjeta)->addMonths(count($validatedData['meses']));

        $tarjeta->save();

        $pago->save();
        $hoy = Carbon::today()->format('d-m-Y');
        $detalles = [
            'meses' => $pago->meses_pago,
            'montoPagado' => $pago->meses_pago * $tarjeta->monto_tarjeta,
            'fechaPago' => $hoy,
            'id_pago' => $pago->id_pago
        ];

        $beneficiario = Beneficiario::where('id_beneficiario', $beneficiario)->with('tarjeta')->first();

        $pdf = PDF::setPaper([0, 0, 226.77, 650], 'portrait')->loadView('pdf.ticket', compact('beneficiario', 'detalles', 'tarjeta'));
        $pdf->render();
        return $pdf->download('recibo_' . $hoy . '_' . $tarjeta->numero_tarjeta . '.pdf');
    }

    public function imprimir($beneficiario){
        $beneficiario = Beneficiario::where('id_beneficiario', $beneficiario)->with('tarjeta')->first();
        $pdf = PDF::setPaper([0, 0, 240.94, 155.91], 'portrait')->loadView('pdf.tarjeta', compact('beneficiario'));
        $pdf->render();
        return $pdf->stream('tarjeta_' . $beneficiario->aPaterno_beneficiario . $beneficiario->aMaterno_beneficiario . $beneficiario->nombre_beneficiario . '_' . $beneficiario->id_beneficiario . '.pdf');
    }
}
