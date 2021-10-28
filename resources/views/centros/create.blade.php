@extends("layouts.app2")


@section("contenido")

	<h3>Formulario para insertar</h3>

<form method="POST" action="{{isset($centro)?route("centros.update",[$centro->id]):route("centros.store")}}">
  <div class="form-group">
    <label for="codigo">Codigo</label>
    <input type="text" class="form-control" id="codigo" name="Codigo" value='{{$centro->Codigo??old("Codigo")}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Denominacion</label>
    <input type="text" class="form-control" id="denominacion" name="Denominacion"  value='{{$centro->Denominacion??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Localidad</label>
    <input type="text" class="form-control" id="localidad" name="Localidad"  value='{{$centro->Localidad??''}}'>
  </div>
  <div class="form-group">
    <label for="direccion">Direccion</label>
    <input type="text" class="form-control" id="direccion" name="Direccion"  value='{{$centro->Direccion??''}}'>
  </div>
  <div class="form-group">
    <label for="codigo">Isla</label>
    <input type="text" class="form-control" id="isla" name="Isla"  value='{{$centro->Isla??''}}'>
  </div>
	@csrf
	
	@if (isset($centro))
		<input type="hidden" name="_method" value="PUT">
	@endif
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>


@endsection