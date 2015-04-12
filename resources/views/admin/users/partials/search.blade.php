<!-- se usa Request::all() para guardar las selecciones en futuras busquedas -->
{!! Form::model(Request::all(),['route' => 'admin.users.index' , 'method' => 'GET' , 'class' => 'navbar-form navbar-left pull-right' , 'role' => 'search']) !!}
<div class="form-group">
<!--input type="text" class="form-control" placeholder="Search"-->
{!! Form::text('name',null,['class' => 'form-control' , 'placeholder' => 'Nombre de Usuario']) !!}
<!-- con el valor options.types accedo al directorio config/options.php -->
{!! Form::select('type', config('options.types'),null,['class' => 'form-control']) !!} 

</div>
<button type="submit" class="btn btn-default">Buscar!</button>
{!! Form::close() !!}