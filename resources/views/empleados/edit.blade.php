@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/empleados/'.$empleado->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label class="form-label">Nombre</label>
        <input class="form-control" type="text" name="Nombre" value="{{ $empleado->nombre  }}" autocomplete="off">
    </div>
    <div class="form-group">
        <label class="label-control">Primer Apellido</label>
        <input class="form-control" type="text" name="primer_apellido" value="{{ $empleado->primer_apellido }}">
    </div>
    <div class="form-group">
        <label class="label-control">Segundo Apellido</label>
        <input class="form-control" type="text" name="segundo_apellido" value="{{ $empleado->segundo_apellido }}">
    </div>
    <div class="form-group">
        <label class="label-control">Correo</label>
        <input class="form-control" type="email" name="correo" value="{{ $empleado->correo }}">
    </div>
    <div class="form-group">
        <label class="label-control">Perfil</label>
        <input class="form-control" type="text" name="cargo" value="{{ $empleado->cargo }}">
    </div>
    <div class="form-group">
        <label class="label-control">Telefono</label>
        <input class="form-control" type="number" name="numero_telefono" value="{{ $empleado->numero_telefono }}">
    </div>
    <div class="form-group">
        <label class="label-control">Foto</label>
    </div>
    <div class="form-group">
        <img src="{{ asset('storage').'/'.$empleado->foto }}" alt="img-usuario" width="200" class="img-thumbnail">
    </div>
    <div class="form-group">
        <input type="file" name="foto">
    </div>
    <div class="form-group">
        <input class=" btn btn-success" type="submit" value="Actualizar">    
        <a href="{{ url('empleados') }}" class="btn btn-danger">Volver</a>
    </div>
</form>
</div>
@endsection