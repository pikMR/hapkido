@extends('app')
@section('content')
<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
 <link href="{{asset('css/app.css')}}" rel="stylesheet"  type="text/css"> <!-- fixed problema css !-->
 <script language="javascript">
function fAgrega()
{
document.getElementById("birthdate").value = document.getElementById("p_birthdate").value;
document.getElementById("phone").value = document.getElementById("p_phone").value;
document.getElementById("twitter").value = document.getElementById("p_twitter").value;
document.getElementById("taquilla").value = document.getElementById("p_taquilla").value;
}
</script>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"></div>
				<div class="panel-body">
                                     @include('admin.users.partials.messages')
                                    {!! Form::model($profile ,['route' => ['perfil.update' , $profile], 'method' => 'PUT'])  !!}
                                    <!-- mode('datos de comparación con formulario','ruta de envio + datos a enviar','modo de redireccionamiento.') -->
                                     @include('admin.users.partials.fields')
                                     @include('admin.home.partials.fields') 
                                  <div class="form-group">
                                  {!! Form::select('type',config('options.types'),null,['class'=>'hidden']) !!}
                                    </div>
                                            <div class="form-group">
                                                <button type="submit" onclick="fAgrega()" class="btn btn-default">Cambiar!</button>
                                            </div>
                                    {!! Form::close() !!}
				</div>
                        </div>
		</div>
	</div>
</div>
@endsection
