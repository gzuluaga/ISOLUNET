@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="">Alcance</a>
	  <span class="breadcrumb-item active">Dashboard</span>
	</nav>
</div>


<div class="br-pagebody pd-x-20 pd-sm-x-30"> 	
	<div class="row row-sm mg-t-20">
@include('partials.message_flash')
	 <div class="col-lg-6">
	    <div class="card shadow-base card-body pd-25 bd-0" style="height: 100%;">
	      <div class="row">
	        <div class="col-sm-6">
	          <h6 class="card-title tx-uppercase tx-12">Entorno</h6>
	          <p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">%</p>
	          <div class="progress mg-b-10">
	            <div class="progress-bar bg-primary progress-bar-xs wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
	          </div><!-- progress -->
	          <p class="tx-12">Generar entorno</p>
	          <p class="tx-11 lh-3 mg-b-0"><a href="{{ URL::to('parm_datos_corportativo') }}" class="btn btn-success btn-xs">Diligenciar</a></p>
	        </div><!-- col-6 -->
	        <div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
	        	<img src="{{ asset('image/empresa.jpg') }}" alt="" height="180" width="180" class="img-circle img-responsive" style="border-radius: 50%;">
	        </div><!-- col-6 -->
	      </div><!-- row -->
	    </div><!-- card -->
	  </div><!-- col-6 -->

	  <div class="col-lg-6">
	    <div class="card shadow-base card-body pd-25 bd-0" style="height: 100%;">
	      <div class="row">
	        <div class="col-sm-6">
	          <h6 class="card-title tx-uppercase tx-12">Productos</h6>
	          <p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">%</p>
	          <div class="progress mg-b-10">
	            <div class="progress-bar bg-primary progress-bar-xs wd-100p" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
	          </div><!-- progress -->
	          <p class="tx-12">Generar Productos</p>
	          <p class="tx-11 lh-3 mg-b-0"><a href="{{ URL::to('parm_datos_corportativo') }}" class="btn btn-success btn-xs">Diligenciar</a></p>
	        </div><!-- col-6 -->
	        <div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
	        	<img src="{{ asset('image/empresa.jpg') }}" alt="" height="180" width="180" class="img-circle img-responsive" style="border-radius: 50%;">
	        </div><!-- col-6 -->
	      </div><!-- row -->
	    </div><!-- card -->
	  </div><!-- col-6 -->

	</div>
</div>
@endsection
@push('scripts')
</script>
@endpush 