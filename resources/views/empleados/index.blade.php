@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>inicio</title>
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-sm-11 mx-auto mt-2">
                <div class="card border-0 shadow">
                  <div class="card-body p-0">
                      <a href={{ url('empleados/create') }} class="btn btn-success mb-2">Agregar Empleado</a>
                      <table class="table table-hover mb-0">
                          <thead class="thead-dark">
                              <tr>
                                  <th scope="col">Nombre compelto</th>
                                  <th scope="col">Perfil</th>
                                  <th scope="col">Correo</th>
                                  <th scope="col">Telefono</th>
                                  <th scope="col">Foto</th>
                                  <th scope="col">Accion</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($empleados as $detalles)
                                  <tr>
                                      <td>
                                          {{ $detalles->nombre}}
                                          {{ $detalles->primer_apellido}} 
                                          {{ $detalles->segundo_apellido }}  
                                      </td>
                                      <td>{{ $detalles->cargo }}</td>
                                      <td>{{ $detalles->correo }}</td>
                                      <td>{{ $detalles->numero_telefono}}</td>
                                      <td><img src="{{ asset('storage').'/'.$detalles->foto }}" alt="img-usuario" class="img-thumbnail img-fluid" width="90" height="90"></td>
                                       <td>
                                           <a href="{{ url('empleados/'. $detalles->id.'/edit')}}" class="btn btn-primary">Editar</a>
                                          <form method="POST" action="{{ url('/empleados/'. $detalles->id) }}" style="display:inline">
                                          @method('DELETE')
                                          @csrf
                                           <button type="submit" onclick="return confirm('¿Esta seguro que quiere borrar?');" class="btn btn-danger">Eliminar</button>  
                                          </form>
                                       </td>
                                  </tr>
                              @endforeach
                          </tbody>
                  </table>  
                  {{ $empleados->links() }}
                  </div>
                </div>          
              </div>
          </div>
      </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>

@endsection

