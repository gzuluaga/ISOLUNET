@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacion</a>
	  <span class="breadcrumb-item active">Calificar Proveedores</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Calificacion de Proveedores</h4>
  		<p class="mg-b-0">Proveedores</p>
	</div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
	
  	 <div class="row">
	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	        @if (count($errors) > 0)
	        <div class="alert alert-danger">
		        <ul>
		            @foreach($errors -> all() as $error)
		                <li>{{$error}}</li>
		            @endforeach
		        </ul>
	        </div>
	        @endif
	    </div>
	</div>

<br>
@include('partials.message_flash')
{{  Form::open(['action' => 'Parametrizacion\AreasCargoController@store_areas','autocomplete'=>'off', 'metdod' => 'POST', 'files' => true]) }}
{!! Form::token() !!}


		<div class="row">
			<div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
				<div class="form-group">
			    	<label for="datos">Insumo</label>
			    	<select name="" id="" class="form-control">
			    		<option value="">Seleccionar</option>
			    	</select>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-lg-4col-xs-12">
				<div class="form-group">
			    	<label for="datos">Proveedor</label>
			    	<select name="" id="" class="form-control">
			    		<option value="">Seleccionar</option>
			    	</select>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-lg-4col-xs-12">
				<div class="form-group">
			    	<label for="datos">Fecha a Evaluar</label>
			    	<input type="date" class="form-control" name="" id="">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
				<div class="form-group">
			    	<label for="datos">Cumplimiento en Tiempo de entrega</label>
			    	<select name="" id="" class="form-control">
			    		<option value="">Seleccionar</option>
			    		<option value="">Si</option>
			    		<option value="">No</option>
			    	</select>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 col-lg-4col-xs-12">
				<div class="form-group">
			    	<label for="datos">Cumplimiento en Items pedidos</label>
			    	<select name="" id="" class="form-control">
			    		<option value="">Seleccionar</option>
			    		<option value="">1% a 20%</option>
			    		<option value="">21% a 40%</option>
			    		<option value="">41% a 60%</option>
			    		<option value="">61% a 80%</option>
			    		<option value="">81% a 90%</option>
			    		<option value="">100%</option>
			    	</select>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
				<div class="form-group">
			    	<label for="datos">Cumplimiento en precio</label>
			    	<select name="" id="" class="form-control">
			    		<option value="">Seleccionar</option>
			    		<option value="">Si</option>
			    		<option value="">No</option>
			    	</select>
				</div>
			</div>
			
		</div>


		<div class="row">
			

			<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
				<div class="form-group">
			    	<label for="datos">Cumplimiento en Sevicio</label>
			    	<select name="" id="" class="form-control">
			    		<option value="">Seleccionar</option>
			    		<option value="">Si</option>
			    		<option value="">No</option>
			    	</select>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
				<div class="form-group">
			    	<label for="datos">Cumplimiento productos / servicios conforme a especificaciones</label>
					<select name="" id="" class="form-control">
						<option value="">Seleccionar</option>
						<option value="">1% a 20%</option>
			    		<option value="">21% a 40%</option>
			    		<option value="">41% a 60%</option>
			    		<option value="">61% a 80%</option>
			    		<option value="">81% a 90%</option>
			    		<option value="">100%</option>
					</select>			    	
				</div>
			</div>
		
		</div>

	
			<button type="submit" class="btn btn-primary">Guardar</button>
			
  		<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  {!!Form::close()!!}
<br><br>

<div class="br-section-wrapper">
	<div class="row">
		<h4>Listado De Proveedores Calificados</h4>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
			<div class="table-responsive">
			  <table class="table">
			    <tdead>
			    			    	
			    </tdead>
			    <tbody>
			    	<tr>
			    		<td rowspan="3">
			    			1
			    		</td>
			    		<td>
			    			Insumo <br>
			    			<b>Cal</b>
			    		</td>
			    		<td>
			    			Proveedor <br>
			    			<b>Cales del Valle</b>
			    		</td>
			    		<td>
			    			Fecha a Evaluar <br>
			    			<b>2020-01-19</b>
			    		</td>
			    		<td>
			    			Cumplimiento en tiempo de entrega <br>
			    			<b>Si</b>
			    		</td>
			    		<td >
			    			total
			    		</td>
			    		<td >
			    			Opciones
			    		</td>
			    	</tr>	
			    	<tr>
			    		
			    		<td>
			    			Cumplimiento Items Pedidos <br>
			    			<b>81% - 90%</b>
			    		</td>
			    		<td>
			    			Cumplimiento en precio <br>
			    			<b>Si</b>
			    		</td>
			    		<td>
			    			Cumplimiento en servicios <br>
			    			<b>Si</b>
			    		</td>
			    		<td>
			    			Cumplimiento en tiempo de entrega <br>
			    			<b>Si</b>
			    		</td>
			    		<td rowspan="2">
			    			<b>7.8</b>
			    		</td>
			    		<td rowspan="2">
			    			<a href="" class="btn btn-success">Editar</a><br>
			    			<a href="" class="btn btn-danger">Eliminar</a>
			    		</td>
			    	
			    	</tr>	
			    	<tr>
			    		
			    		<td>
			    			Cumplimiento en servicio <br>
			    			<b>Si</b>
			    		</td>
			    		<td>
			    			Cumplimiento productos / servicios conforme a especificaciones <br>
			    			<b>61% - 80%</b>

			    		</td>
			    		<td>
			    			
			    		</td>
			    		<td>
			    			
			    		</td>
			    	
			    	</tr>	
			    </tbody>
			  </table>
			</div>
			
		</div>
	</div>
</div>

  </div>
</div>
@endsection


@push('scripts')
<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)

$('.input-number').on('input', function () { 
    tdis.value = tdis.value.replace(/[^0-9]/g,'');
});

</script>
@endpush