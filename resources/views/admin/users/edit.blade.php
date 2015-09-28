@extends('app')
@section('content')
<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
<link href="{{asset('css/app.css')}}" rel="stylesheet"  type="text/css"> <!-- @fixed problema css -->
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Edición de Usuario -> {{$user->first_name}}</div>

				<div class="panel-body">
                                     @include('admin.users.partials.messages')
                                    {!! Form::model($user , ['route' => ['admin.users.update' , $user], 'method' => 'POST'])  !!}
                                     @include('admin.users.partials.fields')
                                     {!! Form::hidden('id',$user->id)!!}
                                     <!-- Aquí vendra la sección de elegir usuario para le administrador. -->
                                     <div class="form-group"> 
                                             {!! Form::label('type','Tipo de usuario') !!}
                                             {!! Form::select('type',config('options.types'),null,['class'=>'form-control']) !!}
                                    <!-- con config('options.types') accedemos al archivo options que esta en el directorio /config -->
                                    </div>
                                            <div class="form-group">
                                              <!--div class="col-sm-offset-2 col-sm-10"-->
                                                <button type="submit" class="btn btn-default">Actualiza usuario</button>
                                                <!--div class="col-sm-offset-2 col-sm-10"-->
                                                <a href="/profile/{{$user->id}}/edit" class="btn btn-default" role="button">Perfil de {{$user->first_name}}</a>
                                                <a href="/admin/users" class="btn btn-default" role="button">Ver Usuarios</a>
                                                <!--/div-->
                                            </div>
                                        
                                    {!! Form::close() !!}
                                   
				</div>
			
                        </div>
                     @include('admin.users.partials.delete')
		</div>
	</div>
</div>
@endsection
