                                            <div class="form-group">
                                             {!! Form::label('birthdate','Fecha de Nacimiento') !!}
                                             {!! Form::text('profile[birthdate]',null,['id' => 'p_birthdate','class' => 'form-control','placeholder' => 'Por favor introduzca la fecha : Año-Mes-Dia']) !!}
                                            </div>
                                            <div class="form-group">
                                              {!! Form::label('phone','Telefono') !!}
                                              {!! Form::text('profile[phone]',null,['id' => 'p_phone','class'=>'form-control','placeholder' => 'Numero de Telefono ó Movil']) !!}                     
                                            </div>
                                            <!--div class="form-group">
                                              {!! Form::label('twitter','twitter') !!}
                                              {!! Form::text('profile[twitter]',null,['id' => 'p_twitter','class'=>'form-control','placeholder' => '@',]) !!}                     
                                            </div>
                                             <div class="form-group">
                                             {!! Form::label('bio','Descripción') !!}
                                             {!! Form::textarea('profile[bio]',null,['id' => 'p_bio','class' => 'form-control','rows' => '3' ,'style' => 'resize: horizontal','placeholder' => 'Introduzca la descripción']) !!}
                                            </div-->
                                            <div class="form-group">
                                              {!! Form::label('twitter','twitter') !!}
                                              {!! Form::text('profile[twitter]',null,['id' => 'p_twitter','class'=>'form-control','placeholder' => '@',]) !!}                     
                                            </div>
                                            <div class="form-group">
                                              {!! Form::label('taquilla','taquilla') !!}
                                              {!! Form::text('profile[taquilla]',null,['id' => 'p_taquilla','class'=>'form-control','placeholder' => 'Letra de Taquilla','maxlength'=>'1']) !!}                     
                                            </div>

                                             <!-- uso de script para copiar datos en estos : -->
                                             {!! Form::text('twitter',null,['id' => 'twitter','class'=>'hidden']) !!}  
                                             {!! Form::text('birthdate',null,['id' => 'birthdate','class' => 'hidden']) !!}
                                             {!! Form::text('phone',null,['id' => 'phone','class' => 'hidden']) !!}                     
                                            <!-- {!! Form::textarea('bio',null,['id' => 'bio','class' => 'hidden']) !!} -->
                                             {!! Form::textarea('taquilla',null,['id' => 'taquilla','class' => 'hidden']) !!}