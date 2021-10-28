  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<table id="tabla" class="table table-striped table-bordered">
	<thead>
		<tr><th>Codigo</th><th>Nombre</th><th>Ciudad</th><th>Isla</th></tr>
	</thead>
	<tbody>
		@foreach($centros as $centro)
			<tr data-id="{{$centro->id}}">
				<td>{{$centro->Codigo}}</td>
				<td>{{$centro->Denominacion}}</td>
				<td>{{$centro->Localidad}}</td>
				<td>{{$centro->Isla}}</td>
			</tr>
		@endforeach
	</tbody>	
</table>


