<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de pago</title>
</head>
<body>
    <img src="{{asset('logo.png')}}">
    <b><h3>Recibo de pago de servicio de agua potable</h3></b>
    <h4>Recibo para {{$beneficiario->nombre_beneficiario}} {{$beneficiario->aPaterno_beneficiario}}</h4>
    <hr>
    <br>

    <h1>Punto de pago</h1>
    <h3>Presidencia de comunidad de San Vicente Xiloxochitla</h3>
    <h3>Calle ...</h3>
    <hr>
    <h1>Información del pago</h1>
    <h3><b>Nombre de el/la Beneficiario/a: </b>{{$beneficiario->nombre_beneficiario}} {{$beneficiario->aPaterno_beneficiario}} {{$beneficiario->aMaterno_beneficiario}}</h3>
    <h3><b>Monto de pago: </b>${{ $detalles['montoPagado'] }}</h3>
    <h3><b>Fecha de pago: </b>{{ $detalles['fechaPago'] }}</h3>
    <h3><b>Proximo de pago: </b>{{ $tarjeta->proximoPago_tarjeta }}</h3>
</body>
</html>