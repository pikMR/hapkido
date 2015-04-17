                                            <div class="form-group">
                                             {!! Form::label('email','Correo electrónico') !!}
                                             {!! Form::text('email',null,['class' => 'form-control','placeholder' => 'Por favor introduzca el email']) !!}
                                            </div>
                                            <div class="form-group">
                                              {!! Form::label('password','Contraseña') !!}
                                              {!! Form::password('password', ['class'=>'form-control']) !!}                     
                                            </div>
                                             <div class="form-group">
                                             {!! Form::label('first_name','Primer nombre') !!}
                                             {!! Form::text('first_name',null,['class' => 'form-control','placeholder' => 'Introduzca el nombre de usuario']) !!}
                                            </div>
                                             <div class="form-group">
                                             {!! Form::label('last_name','Apellido') !!}
                                             {!! Form::text('last_name',null,['class' => 'form-control','placeholder' => 'Introduzca el apellido']) !!}
                                            </div>
                                            {!! Form::hidden('id',$user->id)!!}
                                             