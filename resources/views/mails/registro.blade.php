<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Test</h1>
    <p><strong>Nombre:</strong>{{ $data['name'] }} {{ $data['lastname'] }}</p>
    <p><strong>Teléfono:</strong> {{ $data['email'] }}</p>
    <p><strong>Correo:</strong> {{$data['full_number']}}</p>
</body>

</html>
