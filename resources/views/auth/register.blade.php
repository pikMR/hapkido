@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
                            @if (Session::has('store_message'))
                                    <p class="alert alert-success">{{ Session::get('store_message') }}</p>
                            @endif
				<div class="panel-heading">Register</div>
                                <div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::open(['route' => 'register.add' , 'method' => 'POST']) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                 @include('admin.users.partials.fields')
                                                 {!! Form::hidden('type','user')!!}
                                                 {!! Form::hidden('active','0')!!}
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                                                @if (Session::has('store_message'))
                                                                <button type="submit" class="btn btn-primary" disabled>
                                                                @else
                                                                <button type="submit" class="btn btn-primary">
                                                                @endif
									Register
								</button>
                                                                
							</div>
						</div>
					 {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection