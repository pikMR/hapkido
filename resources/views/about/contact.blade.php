@if(Session::has('message'))
<ul>
    @foreach($errors->all() as $error)
        <li></li>
    @endforeach
</ul>
    <div class="alert alert-info">
         Correo Enviado!
    </div>
@endif
{!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}
<div class="form-group">
    {!! Form::label('Tu nombre') !!}
    {!! Form::text('name', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'nombre')) !!}
</div>

<div class="form-group">
    {!! Form::label('Tu correo') !!}
    {!! Form::text('email', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'email')) !!}
</div>

<div class="form-group">
    {!! Form::label('Tu duda / mensaje') !!}
    {!! Form::textarea('message', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Mensaje')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Enviar!', 
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
    
