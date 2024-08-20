<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function ticket($beneficiario){
        $beneficiario = Beneficiario::where('id_beneficiario', $beneficiario)->with('tarjeta')->first();
        $pdf = PDF::loadView('pdf-ticket', compact('beneficiario'));
        return $pdf->stream();
    }
}
