<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Pago;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index(){
        return view('reports.index');
    }

    public function dia(Request $request){
        $request->validate([
            'date' => 'required'
        ]);

        $hoy = Carbon::parse($request->date);
        $pagos = Pago::whereRaw('DATE(fecha_pago) = ?', [$hoy])->with(['tarjeta.beneficiario'])->get();

        $pdf = PDF::loadView('pdf.reports.dia', compact('pagos', 'hoy'));
        $pdf->render();
        return $pdf->download('reporte_pagos_' . $hoy->format('d_m_Y') . '.pdf');
    }

    public function mes(Request $request){
        $request->validate([
            'month' => 'required'
        ]);

        $mes = Carbon::parse($request->month);
        $pagos = Pago::whereMonth('fecha_pago', $mes->month)->whereYear('fecha_pago', $mes->year)->get();

        $pdf = PDF::loadView('pdf.reports.mes', compact('pagos', 'mes'));
        $pdf->render();
        return $pdf->download('reporte_pagos_' . $mes->format('F_Y') . '.pdf');
    }

    public function users(){

        $beneficiarios = Beneficiario::whereHas('tarjeta', function ($q){
                    $q->where('mesesPendientes_tarjeta', '>', 0);
                })->with('tarjeta')->get();
        $pdf = PDF::loadView('pdf.reports.users', compact('beneficiarios'));
        $pdf->render();
        $today = Carbon::today()->format('Y-m-d');
        
        return $pdf->download('reporte_de_usuarios_' . $today . '.pdf');
    }
}
