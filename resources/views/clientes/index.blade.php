
@extends('layouts.app2')


@section("contenido")
<h1>Clientes</h1>
<table id="tabla">
	<thead>
		<tr><th>Codigo</th><th>Empresa</th><th>Contacto</th><th>Dirección</th><th>Ciudad</th><th></th><th></th><th></th></tr>
	</thead>
	<tbody>
	@foreach($clientes as $cliente)
		<tr data-id="{{$cliente->id}}">
			<td class='show_pedidos'>{{$cliente->codigo}}({{$cliente->pedidos->count()}})</td>
			<td>{{$cliente->empresa}}</td>
			<td>{{$cliente->contacto}}</td>
			<td>{{$cliente->direccion}}</td>
			<td>{{$cliente->ciudad}}</td>
			<td><img class='btn_borrar' width="32px" src="https://www.pngrepo.com/png/190063/512/trash.png"></td>
			<td><a href='{{url("clientes/$cliente->id/edit")}}'><img class='btn_editar' width="32px" src="https://freepngimg.com/download/pencil/37514-6-pencil-icon.png"></a></td>

		<td><a href='{{url("cliente/qr")}}/{{$cliente->uuid}}'><img class='btn_qr' width="32px" src="https://img2.freepng.es/20180509/pce/kisspng-qr-code-computer-icons-barcode-2d-code-qr-codea4-5af2f189b87573.2392149115258709857556.jpg"></a></td>
					</tr>
		
		
	@endforeach
	</tbody>	
</table>


<!-- Modal -->
<div class="modal fade" id="pedidos_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal_body" class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		$("#tabla").DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
		});

        $(".show_pedidos").click(function(){
            const clienteId=$(this).closest("tr").data("id");
            $.ajax({
                url    : "{{url('/pedidos/listado')}}/"+clienteId,
                success: function(datos){
                    $("#modal_body").html("");
                    for(let i=0;i<datos.length;i++){
                        $("#modal_body").append(datos[i].fecha_pedido+"<br>");
                    }
                    
                    $("#pedidos_modal").modal();


                }
            })    
        


       
        })



		
		$(".btn_borrar").click(function(){
			const $tr=$(this).closest("tr");
			const id=$tr.data("id");
		
            
			
			
			
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