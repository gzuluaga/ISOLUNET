@extends('layouts.dashboard')

@section('content')
<div class="br-pageheader">
	<nav class="breadcrumb pd-0 mg-0 tx-12">
	    <a class="breadcrumb-item" href="{{ URL::to('/') }}">Dashboard</a>
	    <a class="breadcrumb-item" href="#">Liderazgo</a>
	    <span class="breadcrumb-item active">Presupuesto</span>
	</nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
	<i class="icon icon ion-aperture"></i>
	<div>
  		<h4>Presupuesto</h4>
	</div>
</div><!-- d-flex -->

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <div class="row">
            <h4>Ingresos</h4>
        </div><br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Item
                                </th>
                                <th>
                                    2020 Proyectado
                                </th>
                                <th>
                                    2020 Real
                                </th>	
                                <th>
                                    Total Diferencia
                                </th>	
                                <th>
                                    % Diferencia
                                </th>                                
                            </tr>			    	
                        </thead>
                        <tbody>								
                            <tr>
                                <td>									
                                    MATRICULAS BACHILLERATO										
                                </td>
                                <td>
                                    7.589.000
                                </td>	
                                <td>
                                    7.589.000                                  
                                </td>
                                <td>
                                    0                                  
                                </td>
                                <td>
                                    0%                                    
                                </td>                                
                            </tr>
                            <tr>
                                <td>									
                                    MENSUALIDADES BACHILLERATO										
                                </td>
                                <td>
                                    17.553.360
                                </td>	
                                <td>
                                    17.553.360                                  
                                </td>
                                <td>
                                    0                                  
                                </td>
                                <td>
                                    0%                                    
                                </td>                                
                            </tr>
                            <tr>
                                <td>									
                                    MATRICULAS PROGRAMAS TECNICOS									
                                </td>
                                <td>
                                    20.880.333  
                                </td>	
                                <td>
                                    22.314.166                                   
                                </td>
                                <td>
                                    1.433.833                                 
                                </td>
                                <td>
                                    7%                                    
                                </td>                                
                            </tr>
                            <tr>
                                <td>									
                                    MATRICULAS CURSOS PERSONALIZADOS									
                                </td>
                                <td>
                                    803.333    
                                </td>	
                                <td>
                                    645.000                                    
                                </td>
                                <td>
                                    -158.333                                  
                                </td>
                                <td>
                                    -20%                                    
                                </td>                                
                            </tr>
                            <tr>
                                <td>									
                                    <B>TOTAL INGRESOS BRUTOS</b>							
                                </td>
                                <td>
                                    51.488.259    
                                </td>	
                                <td>
                                    53.358.195                                    
                                </td>
                                <td>
                                    1.869666                                 
                                </td>
                                <td>
                                    4%                                    
                                </td>                                
                            </tr>
                        </tbody>
                    </table>
					</div>					
				</div>
			</div>
		</div>        
  	</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <div class="row">
            <h4>Egresos</h4>
        </div><br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Item
                                </th>
                                <th>
                                    2020 Proyectado
                                </th>
                                <th>
                                    2020 Real
                                </th>	
                                <th>
                                    Total Diferencia
                                </th>	
                                <th>
                                    % Diferencia
                                </th>                                
                            </tr>			    	
                        </thead>
                        <tbody>								
                            <tr>
                                <td>									
                                    NOMINAS ADMINISTRATIVAS									
                                </td>
                                <td>
                                    4.666.634  
                                </td>	
                                <td>
                                    5.210.395                                    
                                </td>
                                <td>
                                    543.761                                    
                                </td>
                                <td>
                                    12%                                    
                                </td>                                
                            </tr>
                            <tr>
                                <td>									
                                    NOMINA CONTADOR										
                                </td>
                                <td>
                                    1.236.000  
                                </td>	
                                <td>
                                    1.236.000                                  
                                </td>
                                <td>
                                    0                                  
                                </td>
                                <td>
                                    0%                                    
                                </td>                                
                            </tr>
                            <tr>
                                <td>									
                                    MATRICULAS PROGRAMAS TECNICOS									
                                </td>
                                <td>
                                    20.880.333  
                                </td>	
                                <td>
                                    22.314.166                                   
                                </td>
                                <td>
                                    1.433.833                                 
                                </td>
                                <td>
                                    7%                                    
                                </td>                                
                            </tr>
                            <tr>
                                <td>									
                                    APORTES PARAFISCALES									
                                </td>
                                <td>
                                    1.522.000      
                                </td>	
                                <td>
                                    1.545.200                                      
                                </td>
                                <td>
                                    23.200                                  
                                </td>
                                <td>
                                    -2%                                    
                                </td>                                
                            </tr>
                            <tr>
                                <td>									
                                    <B>TOTAL EGRESOS</b>							
                                </td>
                                <td>
                                    26.189.329      
                                </td>	
                                <td>
                                    23.545.802                                     
                                </td>
                                <td>
                                    1.325.658                                 
                                </td>
                                <td>
                                    5%                                    
                                </td>                                
                            </tr>
                        </tbody>
                    </table>
					</div>					
				</div>
			</div>
		</div>        
  	</div>

      <div class="br-pagebody">
    <div class="br-section-wrapper">
        <div class="row">
            <h4>Ingresos - Egresos</h4>
        </div><br>
        <div class="row">
            <div class="col-md-12 col-sm-612 col-xs-12 col-lg-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Item
                                </th>
                                <th>
                                    2020 Proyectado
                                </th>
                                <th>
                                    2020 Real
                                </th>	
                                <th>
                                    Total Diferencia
                                </th>	
                                <th>
                                    % Diferencia
                                </th>                                
                            </tr>			    	
                        </thead>
                        <tbody>								
                            <tr>
                                <td>									
                                    Total									
                                </td>
                                <td>
                                    20.765.325 
                                </td>	
                                <td>
                                    18.325.652                                    
                                </td>
                                <td>
                                    1.345.720                                    
                                </td>
                                <td>
                                    8%                                    
                                </td>                                
                            </tr>                            
                        </tbody>
                        <thead>
                            <tr>
                                <th>
                                    % de Cumplimiento del Presupuesto
                                </th>
                                <th>
                                    % de Utilidad
                                </th>
                        </thead>
                        <tbody>								
                            <tr>
                                <td>									
                                    91%									
                                </td>
                                <td>									
                                    47,8%									
                                </td>
                            </tr>
                        </tbody>
                    </table>
					</div>					
				</div>
			</div>
		</div>        
</div>
@endsection