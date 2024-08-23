<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <style>
        @page{
            margin: 2cm;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
        }
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            text-align: center;
            background-color: #f8f8f8;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            font-size: 12px;
        }
        .header h1 {
            margin: 0;
            padding: 0;
            font-size: 18px;
            font-family: Arial, sans-serif;
        }
        .content {
            margin: 60px 20px; /* Espacio para el header y footer */
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .content table, .content th, .content td {
            border: 1px solid #ddd;
        }
        .content th, .content td {
            padding: 8px;
            font-size: 14px;
            text-align: left;
        }
        .content th {
            background-color: #f4f4f4;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sistema para la Gestion del Servicio de Agua Potable - San Vicente Xiloxochitla</h1>
    </div>
    <br>
    <div class="content">
        <h1>Reporte de pagos por mes</h1>
        <p>{{ $mes->format('m/Y') }}</p>
        
        <table>
            <thead>
                <tr>
                    <th>ID Pago</th>
                    <th>No. Tarjeta</th>
                    <th>Meses pagados</th>
                    <th>Monto pagado</th>
                    <th>Nombre del beneficiario</th>
                    <th>Tipo de usuario</th>
                    <th>Fecha y hora de pago</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                <tr>
                    <td>{{ $pago->id_pago }}</td>
                    <td>{{ $pago->tarjeta->numero_tarjeta }}</td>
                    <td>{{ $pago->meses_pago }}</td>
                    <td>{{ ($pago->meses_pago * $pago->tarjeta->monto_tarjeta)  }}</td>
                    <td>{{ $pago->tarjeta->beneficiario->nombre_beneficiario  }} {{ $pago->tarjeta->beneficiario->aPaterno_beneficiario  }} {{ $pago->tarjeta->beneficiario->aMaterno_beneficiario  }}</td>
                    <td>{{ $pago->tarjeta->tipoUsuario_tarjeta }}</td>
                    <td>{{ $pago->fecha_pago }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="footer">
        Página { PAGE_NUM } de { PAGE_COUNT }
    </div> --}}
</body>
</html>
