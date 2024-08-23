<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <style>
        @page{
            margin: 3cm 1cm 1cm 1cm;
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
            top: -1cm;
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
            margin: 0 20px; /* Espacio para el header y footer */
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
        <h1>Reporte de beneficiarios con adeudos</h1>
        <table>
            <thead>
                <tr>
                    <th>No. Tarjeta</th>
                    <th>Nombre del beneficiario</th>
                    <th>Direccion</th>
                    <th>Tipo de usuario</th>
                    <th>Monto por mes</th>
                    <th>Meses de adeudo</th>
                    <th>Proxima fecha de pago</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beneficiarios as $beneficiario)
                <tr>
                    <td>{{ $beneficiario->tarjeta->numero_tarjeta }}</td>
                    <td>{{ $beneficiario->nombre_beneficiario }} {{ $beneficiario->aPaterno_beneficiario }} {{ $beneficiario->aMaterno_beneficiario }}</td>
                    <td>{{ $beneficiario->direccion_beneficiario }}, {{ $beneficiario->colonia_beneficiario }}</td>
                    <td>{{ $beneficiario->tarjeta->tipoUsuario_tarjeta }}</td>
                    <td>${{ $beneficiario->tarjeta->monto_tarjeta }}</td>
                    <td>{{ $beneficiario->tarjeta->mesesPendientes_tarjeta }}</td>
                    <td>{{ $beneficiario->tarjeta->proximoPago_tarjeta }}</td>
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
