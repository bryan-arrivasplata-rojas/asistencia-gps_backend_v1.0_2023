<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$nombre}}</title>
</head>
<body>
    <h2>{{$nombre}}</h2>
    <h1> Hola doy el archivo vista</h1>
    <p>este es mi primer encuentro</p>
    <a href="{{route('ruta.users.create')}}">Crear usuario</a>
    <a href="{{route('ruta.users.show')}}">Show usuario</a>
    <a href="{{route('ruta.users.edit')}}">Editar usuario</a>
    <a href="{{route('ruta.users.delete')}}">Eliminar usuario</a>
</body>
</html>