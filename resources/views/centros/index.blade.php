
@extends('layouts.app2')


@section("contenido")
<a href="{{route('centros.create')}}" class="btn btn-success">+ Insertar</a>
<h1>Centros</h1>
<table id="tabla">
	<thead>
		<tr><th>Codigo</th><th>Nombre</th><th>Ciudad</th><th>Isla</th><th></th><th></th></tr>
	</thead>
	<tbody>
	@foreach($centros as $centro)
		<tr data-id="{{$centro->id}}">
			<td>{{$centro->Codigo}}</td>
			<td>{{$centro->Denominacion}}</td>
			<td>{{$centro->Localidad}}</td>
			<td>{{$centro->Isla}}</td>
			<td><img class='btn_borrar' width="32px" src="https://www.pngrepo.com/png/190063/512/trash.png"></td>
			<td><a href='{{url("centros/$centro->id/edit")}}'><img class='btn_editar' width="32px" src="https://freepngimg.com/download/pencil/37514-6-pencil-icon.png"></a></td>
		</tr>
	@endforeach
	</tbody>	
</table>


<script>
	$(document).ready(function(){
		$("#tabla").DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
		});
		
		$(".btn_borrar").click(function(){
			const $tr=$(this).closest("tr");
			const id=$tr.data("id");
		
	/*		
			const params = {
				_method    : 'DELETE',
				_token  : "{{csrf_token()}}", 
			};
			const options = {
				method: 'POST',
				body: JSON.stringify( params )  
			};
			fetch( "{{url('/centros')}}/"+id, options )
				.then( response => response.text() )
				.then( response => {
					alert(response); 
			});
	*/		
			
			
			
			Swal.fire({
			  title: '¿Estás seguro que quieres borrar este centro?',
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Borrar',
			  cancelButtonText: 'Cancelar',
			}).then((result) => {
			  if (result.isConfirmed) {	//se pulsó el botón de confirmado
				$.ajax({
					method  : "POST",
					url		: "{{url('/centros')}}/"+id,
					data    : {
						_method    : 'DELETE',
						_token  : "{{csrf_token()}}", 
					},
					success : function() {
						$tr.fadeOut()
					} 

				})	  
		  }
			})
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
			
						
		});
		
		
		
		
		
		
		
		
		
		
		
	});

</script>

@endsection