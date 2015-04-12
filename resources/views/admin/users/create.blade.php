@extends('app')
@section('content')
<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
 <link href="{{asset('css/app.css')}}" rel="stylesheet"  type="text/css"> <!-- fixed problema css -->
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Creación de Usuario</div>
				<div class="panel-body">     
                                    @include('admin.users.partials.messages')
                                    {!! Form::open(['route' => 'admin.users.store' , 'method' => 'POST']) !!}
                                    @include('admin.users.partials.fields')
                                    {!! Form::label('type','Tipo de usuario') !!}
                                    {!! Form::select('type',config('options.types'),null,['class'=>'form-control']) !!}                
                                    <button type="submit" class="btn btn-default">Crea usuario!</button>
                                    <a href="/laravel/public/admin/users" class="btn btn-default" role="button">Ver Usuarios</a>
                                    {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
