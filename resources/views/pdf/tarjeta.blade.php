<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de pago</title>
    <style>
        * {
            margin: 0;
            padding: 5;
            font-family: 'Helvetica', sans-serif;
            
        }
        p{
            padding: 0 3;
            margin: 0 3;
            font-size: 14px;
        }
        hr{
            margin: 5;
            padding: 0;
            background-color: black;
        }
        h4{
            margin: 0;
            padding: 0;
            font-size: 10px;
        }
        h3{
            margin: 0;
            padding: 0;
            font-size: 12px;
        }
        table{
            margin: 0 auto;
            padding: 0 auto;
        }
        .salto{
            page-break-after: always;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td><img src="{{ public_path('logo.png') }}" alt="Logo de San Vicente Xiloxochitla" width="40" height="40"></td>
            <td>
                <h4>San Vicente Xiloxochitla 2024</h4>
                <h3>Tarjeta de pago del servicio de agua potable</h3>
            </td>
        </tr>
    </table>
    
    <center><p>{{ $beneficiario->nombre_beneficiario }} {{ $beneficiario->aPaterno_beneficiario }} {{ $beneficiario->aMaterno_beneficiario }}</p></center>
    <div>
        <p style="font-size: 12px;">No. Tarjeta: </p><p style="font-size: 12px;">{{ $beneficiario->tarjeta->numero_tarjeta }}</p>
    </div>
    <center><p style="font-size: 5; margin-top: 5;">PRESIDENCIA DE COMUNIDAD</p></center>

    <div class="salto"></div>

    <center>
        <img src="#" width="110" height="60">
        <div>
            <p style="font-size: 12px;">Dirección: {{ $beneficiario->direccion_beneficiario }}, {{ $beneficiario->colonia_beneficiario }}</p>
            <p style="font-size: 12px; margin-top: 5;">Monto por mes: ${{ $beneficiario->tarjeta->monto_tarjeta }}</p>
        </div>
        <p style="font-size: 5; margin-top: 5;">Tarjeta generada por el Sistema para la Gestion del Servicio de Agua Potable San Vicente Xiloxochitla</p>
    </center>
</body>
</html>