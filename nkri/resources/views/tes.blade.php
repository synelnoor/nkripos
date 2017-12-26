 @extends('layouts.app')

 {!! Form::open(['url' => '/print']) !!}


	<div class="form-group">
		<label for="exampleInputEmail1">Email address</label>
		<input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Username</label>
		<input type="text" class="form-control" name="username" id="exampleUsername" placeholder="Username">
	</div>
	        <button type="submit" class="btn btn-success">Print</button>
  
 {!! Form::close() !!}

@section('scripts')
<script>
    $('Form').submit(function(event){
    	//console.log( $('Form').submit);
    	e.preventDefault();
	var route = "{{ URL('/print') }}";

	var formData = {
	     	_token:"{{ csrf_token() }}",
	     	email:$('[name="email"]').val(),
	     	username:$('[name="username"]').val(),
	});
	console.log(formData)
    	$.post(route, formData, function(data){
    		if(data.success == 'true')
    			alert('Cetak Data Berhasil...');
    		else
    			alert('Cetak Data GAGAL...');
    	});
    });
</script>
@stop