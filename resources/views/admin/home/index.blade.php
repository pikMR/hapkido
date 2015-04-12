@extends('app')
@section('content')
<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
 <link href="css/app.css" rel="stylesheet"  type="text/css">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
                            
				<div class="panel-heading">Bienvenido {{ $usuario->getFullNameAttribute()}}</div>
                                <br>
                                @if ($usuario->isAdmin())
                                   <div class="row">
                                   @include('admin.home.partials.padmin')
                                   </div>
                                @else
                                    <div class="row col-md-offset-3">
                                       @include('admin.home.partials.potro')
                                @endif    
                                    @if  ( !($usuario->is('editor') || $usuario->is('contributor')) ) 
                                        @if(!$usuario->isAdmin())
                                        <div class="col-md-8">
                                            <a href="help" class="thumbnail">
                                                <img src="images/admin/question.png" alt="Preguntanos algo" >
                                            </a> 
                                            <p class="text-center">Preguntanos o Sugiere algo</p>
                                        </div>
                                        @endif
                                    @else
                                        <div class="col-md-8">
                                            <a href="appeals" class="thumbnail">
                                                <img src="images/admin/requests.png" alt="Comprueba preguntas" >
                                            </a> 
                                            <p class="text-center">Comprueba peticiones o dudas</p>
                                        </div>
                                    @endif
                                 </div>
                                @if ($usuario->isAdmin() || $usuario->is('contributor'))
                                 <div class="row col-md-offset-3">
                                   <div class="col-lg-8 col-md-10">
                                        <a href="admin/avanzado" class="thumbnail">
                                            <img src="images/admin/cinturon.png" alt="Acceso a contenido avanzado" >
                                        </a> 
                                        <p class="text-center">Contenido Avanzado</p>
                                    </div>
                                </div>
                                @endif
			</div>   
		</div>
	</div>
</div>
@endsection
