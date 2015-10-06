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
                                  
                                @if(!$usuario->isAdmin())
                                        @if($usuario->is('user'))
                                        <div class="col-lg-push-6">
                                             <h1 class="text-center">Preguntanos o Sugiere algo</h1>
                                            <a href="help" class="thumbnail">
                                                <img src="images/admin/question.png" alt="Preguntanos algo" >
                                            </a> 
                                           
                                        </div>
                                        @else
                                        <h1 class="text-center">Dropbox</h1>
                                        <div class="col-xs-6 col-lg-12">
                                            <a href="https://www.dropbox.com/sh/n8wqrpe692gwruo/AAAmtKcT4af_V66QSnRZIxz0a?dl=0" class="thumbnail" target='_blank'>
                                                <img src="images/admin/dropbox2.png" alt="Acceso a dropbox" style="width: 200px;height: 200px;">
                                            </a> 
                                            
                                        </div>
                                        <h1 class="text-center">Comprueba peticiones o dudas</h1>
                                        <div class="col-xs-6 col-lg-12">
                                            <a href="appeals" class="thumbnail">
                                                <img src="images/admin/requests.png" alt="Comprueba preguntas" >
                                            </a> 
                                            
                                        </div>
                                        @endif
                                @endif
                                 
                                @if ($usuario->isAdmin() || $usuario->is('contributor'))
                                    <h1 class="text-center">Contenido Avanzado</h1>
                                   <div class="col-xs-6 col-lg-12">
                                        <a href="admin/avanzado" class="thumbnail">
                                            <img src="images/admin/cinturon.png" alt="Acceso a contenido avanzado" >
                                        </a> 
                                        
                                    </div>

                                @endif
                                @if ($usuario->isAdmin())
                                   <div class="row">
                                   @include('admin.home.partials.padmin')
                                   </div>
                                @else
                                    <div class="row col-md-offset-3">
                                       @include('admin.home.partials.potro')
                                @endif  
                                    </div>   
                                </div>
		</div>
	</div>
</div>
@endsection
