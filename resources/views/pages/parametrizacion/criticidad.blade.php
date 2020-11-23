@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	  <a class="breadcrumb-item" href="#">Parametrizacion</a>
	  <span class="breadcrumb-item active">Identificar Criticidad</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Identificar Criticidad</h4>
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
        {{  Form::open(['action' => 'Parametrizacion\AreasCargoController@store_areas','autocomplete'=>'off', 'metod' => 'POST', 'files' => true]) }}
        {!! Form::token() !!}

		<div class="row">

			<div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Insumo/Servicio</label>
			    	<select name="fk_empresa" class="form-control select2">
			    		<option value="">Seleccionar</option>			    		
			    		<option value="">Cal</option>
			    		<option value="">Pintura</option>		    		
			    		<option value="">Cemento</option>		    		
			    	</select>
				</div>
			</div>

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Proveedor</label>
			    	<select name="fk_empresa" class="form-control select2">
			    		<option value="">Seleccionar</option>			    		
			    		<option value="" >Proveedor 1</option>		    		
			    		<option value="" >Proveedor 2</option>		    		
			    		<option value="" >Proveedor 3</option>		    		
			    	</select>
				</div>
			</div>

            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4">
				<div class="form-group">
			    	<label for="datos">Antiguedad</label>
			    	<select name="fk_empresa" class="form-control select2">
			    		<option value="">Seleccionar</option>			    		
			    		<option value="" >10</option>		    		
			    		<option value="" >5</option>		    		
			    		<option value="" >1</option>		    		
			    	</select>
				</div>
			</div>

        </div>

		<div class="row">
            
            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
				<div class="form-group">
			    	<label for="datos">Calidad</label>
			    	<select name="fk_empresa" class="form-control select2">
			    		<option value="">Seleccionar</option>			    		
			    		<option value="" >10</option>		    		
			    		<option value="" >5</option>		    		
			    		<option value="" >1</option>		    		
			    	</select>
				</div>
			</div>

            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
				<div class="form-group">
			    	<label for="datos">Ubicación</label>
			    	<select name="fk_empresa" class="form-control select2">
			    		<option value="">Seleccionar</option>			    		
			    		<option value="" >10</option>		    		
			    		<option value="" >5</option>		    		
			    		<option value="" >1</option>		    		
			    	</select>
				</div>
			</div>

            <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
				<div class="form-group">
			    	<label for="datos">Servicio postventa</label>
			    	<select name="fk_empresa" class="form-control select2">
			    		<option value="">Seleccionar</option>			    		
			    		<option value="" >10</option>		    		
			    		<option value="" >5</option>		    		
			    		<option value="" >1</option>		    		
			    	</select>
				</div>
			</div>

			<div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
				<div class="form-group">
			    	<label for="datos">Calificación Total</label>
			    	<input type="text" class="form-control" id="producto" name="producto" aria-describedby="" value="{{ old('producto') }}">
				</div>
			</div>				
		</div>

			<button type="submit" class="btn btn-primary">Guardar</button>	
			<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar <i class="fas fa-backward"></i></a>
  		{!!Form::close()!!}
		<br>

		<div class="br-section-wrapper">
			<div class="row">
				<h4>Listado de Criticidad</h4>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>
										Insumo
									</th>
									<th>
										Proveedor
									</th>
                                    <th>
										Antiguedad
									</th>	
                                    <th>
										Calidad
									</th>	
                                    <th>
										Ubicación
									</th>
                                    <th>
										Servicio postventa
									</th>
                                    <th>
										Total
									</th>												    		
									<th colspan="2">
										Opciones
									</th>
								</tr>			    	
							</thead>
							<tbody>								
								<tr>
									<td>									
										Cal										
									</td>
									<td>
                                        Proveedor 1                                    
                                    </td>	
                                    <td>
                                        10                                    
                                    </td>
                                    <td>
                                        5                                    
                                    </td>
                                    <td>
                                        10                                    
                                    </td>
                                    <td>
                                        10                                    
                                    </td>
                                    <th>
										7,5
									</th>							
									<td colspan="2">
										<a href="""><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
										<a href="" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
									</td>
								</tr>
                                <tr>
                                <td>									
										Pintura										
									</td>
									<td>
                                        Proveedor 2                                    
                                    </td>	
                                    <td>
                                        10                                    
                                    </td>
                                    <td>
                                        5                                    
                                    </td>
                                    <td>
                                        10                                    
                                    </td>
                                    <td>
                                        10                                    
                                    </td>
                                    <td>
                                        7,5                                    
                                    </td>								
									<td colspan="2">
										<a href="""><i class="fas fa-pencil-alt fa-2x" style="color:#18A4B4;"></i></a>&nbsp;
										<a href="" ><i class="fas fa-trash-alt fa-2x" style="color:#C10000;"></i></a>
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