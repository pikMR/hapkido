@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
                            <!-- $_SERVER["PHP_SELF"] -->
				<div class="panel-heading">Bienvenido al panel de usuarios {{  $nombre  }}</div>
                                    @if (Session::has('message'))
                                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                                    @endif
                                <div class="panel-body">
                                    <!-- panel de busqueda , para modificar usar POST, para las busquedas GET -->
                                    @include('admin.users.partials.search')
                                    <!-- comienzo de cabecera inicial -->
                                    <a type="button" class="btn btn-info" href="users/create" role="buttom">
                                    Crear Usuario</a>
                                    <p> Hay {{ $users->total() }} usuarios</p>
                                    <!-- comienzo de tabla -->
                                    
				@include('admin.users.partials.table')
                                    <!-- comienzo del pie -->
                                    {!! str_replace('/?','?',$users->appends(Request::only(['name','type']))->render()) !!}     
                                    <!-- appends(Request::only(['name','type'])) es usado para paginar con condicional de tipos -->
                                </div>
			</div>
		</div>
	</div>
</div>
{!! Form::open(['route' => ['admin.users.destroy',':USER_ID'],'method' => 'DELETE','id' => 'form-delete']) !!}
<!-- , 'id' => $user->id] -->
{!! Form::close() !!}
@endsection
@section('scripts')
<script src='../js/userdelete.js'></script>
@endsection