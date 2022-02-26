@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-12">
        <h1>Sección para empleados</h1>
        <form action="{{ route('empleados.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label class="control-label">Nombre</label>
                <input type="text" name="Nombre" class="form-control" required  autocomplete="off">
            </div>
            <div class="form-group">
                <label class="control-label">Primer Apellido</label>
                <input type="text" name="primer_apellido" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label class="control-label">Segundo Apellido</label>
                <input type="text" name="segundo_apellido"  class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label class="control-label">Correo</label>
                <input type="email" name="correo" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label class="label-control">Cargo</label>
                <input type="text" name="cargo" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label class="label-control">Telefono</label>
                <input type="number" name="numero_telefono"  class="form-control" required autocomplete="off">
            </div>  
            <div class="form-group">
                <label class="label-control">Foto</label>
                <input class="form-control" type="file" name="foto"> 
            </div>
            
            <input type="submit" class="btn btn-success">
            <a href={{ url('/empleados/') }} class="btn btn-danger" class="mb-5">Volver</a>
        </form>
       </div>
   </div>
</div>
@endsection