
 <table class="table table-striped">
    <tr>
        <!-- id,full_name,profile_id,bio -->
        <th colspan="2">Nombre</th>
        <th colspan="2">Pregunta</th>
        <th></th>
    </tr>
     @foreach ($respuestas as $user)
     {!! Form::open(['url' => 'appeals/remove' , 'method' => 'PUT']) !!}
     <tr data-id="{{ $user->profile_id }}"></tr>
      <td>{{ $user->full_name }}</td>
      <td colspan="2">{{ $user->bio}}</td>
      {!! Form::hidden('bio','')!!}
      {!! Form::hidden('id',$user->profile_id)!!}
      {!! Form::hidden('email',$user->email)!!}
      {!! Form::hidden('name',$user->full_name)!!}
      <td><td/>
      <tr>
      <td colspan="2"></td>
     <td> {!! Form::textarea('respuesta',null,['id' => 'respuesta','class' => 'form-control','rows' => '3' ,'style' => 'resize: horizontal','placeholder' => 'Introduzca una respuesta para ' . $user->full_name ]) !!}
    </td>
      <td><button class="btn btn-default" type="submit">Enviar Respuesta</button><td/>
    </tr>
    {!! Form::close() !!}
 @endforeach
 </table>