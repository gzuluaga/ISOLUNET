@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="">Alcance</a>
	  <span class="breadcrumb-item active">Dashboard</span>
	</nav>
</div>


<div class="br-pagebody"> 	
	<div class="card">
	  <div class="card-header">
	    <center>Alcance</center>
	  </div>
	  <div class="card-body">
	  	<div class="row">
	  		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
	  			<div class="row">
	  				<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
	  					<h4>procesos y limites</h4>
	  					<ul>
	  						<li>Gestion Gerencial</li>
	  						<li>Gestion Gerencial</li>
	  						<li>Gestion Gerencial</li>
	  						<li>Gestion Gerencial</li>
	  						<li>Gestion Gerencial</li>
	  					</ul>
	  				</div>
	  				<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
	  				</div>
	  				<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
	  					<h4>Producto</h4>
	  					<ul>
	  						<li>Productos</li>
	  						<li>Productos</li>
	  						<li>Productos</li>
	  						<li>Productos</li>
	  						<li>Productos</li>
	  					</ul>
	  				</div>
	  			</div>
	  			<div class="row">
	  				<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
	  					<div class="row">
	  						<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
	  						</div>
	  						<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
	  							<img src="{{ asset('img/llave.png') }}" alt="" style="z-index: 2" width="100" height="300">
	  						</div>
	  						<div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
	  							<h5>Alcance del SGC</h5>
	  							<select name="" id="" class="form-control">
	  								<option value="">Seleccionar</option>
	  							</select>
	  							<br>
	  							<textarea name="" id="" rows="3" class="form-control"></textarea>
	  							<br>
	  							<textarea name="" id="" rows="3" class="form-control"></textarea>
	  						</div>
	  						<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
	  							<img src="{{ asset('img/llaveder.png') }}" alt="" style="z-index: 2" width="100" height="300">
	  						</div>
	  						<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12">
	  						</div>
	  					</div>
	  				</div>
	  			</div>
	  			<div class="row">
	  				<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
	  					<h4>Entorno</h4>
	  					<ul>
	  						<li>Gestion</li>
	  						<li>Gestion</li>
	  						<li>Gestion</li>
	  						<li>Gestion</li>
	  						<li>Gestion</li>
	  					</ul>
	  				</div>
	  				<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
	  				</div>
	  				<div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
	  					<h4>Partes Interesadas</h4>
	  					<ul>
	  						<li>Partes Interesadas</li>
	  						<li>Partes Interesadas</li>
	  						<li>Partes Interesadas</li>
	  						<li>Partes Interesadas</li>
	  						<li>Partes Interesadas</li>
	  					</ul>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  </div>
	</div>
</div>
@endsection
@push('scripts')
</script>
@endpush 