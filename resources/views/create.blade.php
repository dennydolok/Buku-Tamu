@extends('layouts.app')
@section('title','Guest Book')

@section('content')
	<div class="container">
			@if ($errors->any())
				{{-- expr --}}
				@foreach ($errors->all() as $element)
					{{-- expr --}}
					<div class="alert alert-danger">
						{{ $element }}
					</div>
				@endforeach
			@endif
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body" style="background-color:lightblue">
						<h4 class="card-title">Tambah Tamu</h4>
						<br>
						<form method="post" action="{{ url('save') }}" enctype="multipart/form-data">
							@csrf
							<div class="form-group focus" >
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" value="{{ old('email') }}">
							</div>
							<div class="form-group">
								<label>Foto</label>
							
								<input type="file" name="foto" class="form-control">
							</div>
							<input type="submit" name="" value="Simpan" class="btn btn-success">
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection