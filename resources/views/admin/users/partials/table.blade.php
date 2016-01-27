
                                    <table class="table table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Tipo</th>
                                            <th>Acciones</th>
                                            <th>Activo</th>
                                        </tr>
                                        @include('admin.users.partials.messages')
                                        @foreach ($users as $user)
                                        <tr data-id="{{ $user->id }}">
                                            <td>{{ $user->id }}</td>
                                            <td>{{$user->full_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{ $user->type}}</td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', $user->id) }}">Editar</a>
                                                <a href="#!" class="btn-delete">Eliminar</a>
                                            </td>
                                           
                                      {!! Form::model($user , ['route' => ['admin.users.update' , $user], 'method' => 'PUT'])  !!}
                                      {!! Form::hidden('type',$user->type)!!}
                                      {!! Form::hidden('first_name',$user->first_name)!!}
                                      {!! Form::hidden('last_name',$user->last_name)!!}
                                      {!! Form::hidden('email',$user->email)!!}
                                      
                                            <td>    @if ($user->active)      
                                               <div class="checkbox-1">
                                                   <input type="checkbox" id="ch{{$user->id}}" value="0" name="active" checked/>
                                                <label for="ch{{$user->id}}"></label>
                                            </div>  
                                                    {!! Form::hidden('active',0)!!}
                                                    @else
                                              
                                            <div class="checkbox-1">
                                                <input type="checkbox" id="ch{{$user->id}}" value="1" name="active" />
                                                <label for="ch{{$user->id}}"></label>
                                            </div>
                                                    {!! Form::hidden('active',1)!!}
                                                    @endif  
                                            </td>
                                            <td>
                                            <button type="submit" class="btn btn-xs">			!
				            </button>
                                            </td>
                                        </tr>
                                     {!! Form::close() !!}
                                        @endforeach
                                        
                                    </table>
                                    
