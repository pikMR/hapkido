@extends('app')
@section('content')
<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
 <link href="css/app.css" rel="stylesheet"  type="text/css">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Lista de Usuarios con preguntas </div>      
                                @include('admin.home.partials.table')
			</div>   
		</div>
	</div>
</div>
@endsection