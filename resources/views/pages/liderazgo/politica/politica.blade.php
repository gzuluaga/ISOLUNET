@extends('layouts.dashboard')

@section('content')


<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	  <a class="breadcrumb-item" href="index.html">Dashboard</a>
	  <a class="breadcrumb-item" href="">Liderazgo</a>
	  <span class="breadcrumb-item active">Politica</span>
	</nav>
</div>

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>POLITICA </h4>
  		<p class="mg-b-0">Liderazgo</p>
	</div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
  
        

    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
        <p align="justify">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
      </div>
    </div>


  </div>
</div>
@endsection
@push('scripts')
@endpush 