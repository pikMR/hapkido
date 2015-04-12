@extends('app')
@section('content')
<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
 <link href="css/app.css" rel="stylesheet"  type="text/css">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
                                @if (Session::has('bio_message'))
                                        <p class="alert alert-success">{{ Session::pull('bio_message','default') }}</p>
                                @endif
				<div class="panel-heading">Plantea tu cuestion o pregunta, la respuesta será enviada a tu correo y podrá ser añadida al FAQ. </div>      
<div class="form-group has-success has-feedback">
  <label class="control-label sr-only" for="inputGroupSuccess4">Escribe tu pregunta aqui!</label>
  <div class="input-group">
    <span class="input-group-addon">?</span>
    {!! Form::open(['route' => ['profile.store'],'method' => 'POST'])  !!}
    <input type="text" class="form-control" id="inputGroupSuccess4" aria-describedby="inputGroupSuccess4Status" name="bio">
  </div>
  <button type="submit" class="btn btn-default" style="float: right;">Enviar!</button>
   {!! Form::close() !!}
</div>
         
			</div>   
		</div>
	</div>
</div>
@endsection
