<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de pago</title>
    <style>
        * {
            margin: 3;
            padding: 3;
            font-family: 'Helvetica', sans-serif;
        }
        p{
            padding: 0 3;
            margin: 2 3;
            font-size: 15px;
        }
        table p{
            padding: 0;
            margin: 0;
            font-size: 13px;
        }
        hr{
            margin: 5;
            padding: 0;
            background-color: black;
            height: 0.2pt;
        }
        h4{
            font-size: 18px;
        }
        table{
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>
    <center><h4>Recibo de pago del servicio de agua potable</h4>
    <h5>San Vicente Xiloxochitla</h5>
    <img src="{{ public_path('logo.png') }}" width="70" height="70"></center>
    <hr>
    <h4>Información del pago</h4>
    <table>
        <tr>
            <td><p><b>ID PAGO: </b></p></td>
            <td><p><b>{{ $detalles['id_pago'] }}</b></p></td>
        </tr>
        <tr>
            <td><p><b>No. Tarjeta: </b></p></td>
            <td><p>{{ $tarjeta->numero_tarjeta }}</p></td>
        </tr>
        <tr>
            <td><p><b>Nombre: </b></p></td>
            <td><p>{{ $beneficiario->nombre_beneficiario }} {{ $beneficiario->aPaterno_beneficiario }} {{ $beneficiario->aMaterno_beneficiario }}</p></td>
        </tr>
        <tr>
            <td><p><b>Monto de pago: </b></p></td>
            <td><p>${{ $detalles['montoPagado'] }}</p></td>
        </tr>
        <tr>
            <td><p><b>Fecha de pago: </b></p></td>
            <td><p>{{ $detalles['fechaPago'] }}</p></td>
        </tr>
        <tr>
            <td><p><b>Proximo pago: </b></p></td>
            <td><p>{{ $tarjeta->proximoPago_tarjeta->format('d-m-Y') }}</p></td>
        </tr>
        <tr>
            <td><p><b>Monto por mes: </b></p></td>
            <td><p>${{ $tarjeta->monto_tarjeta }}</p></td>
        </tr>
    </table>
    <hr>
    <h4>Punto de pago</h4>
    <p>Presidencia de comunidad de San Vicente Xiloxochitla</p>
    <p>Av. Reforma 15<p>
    <p>San Vicente Xiloxochitla Centro<p>
    <p>Nativitas, TLAX 90716, MX<p>
    <br>
    <center><img src="{{public_path('logo.png')}}" width="70" height="70">
    <h4>SAN VICENTE XILOXOCHITLA 2024</h4></center>
</body>
</html>