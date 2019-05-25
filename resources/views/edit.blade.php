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
						<h4 class="card-title">Edit Kontak</h4>
						<form method="post" action="{{ url('update/'.$data->id) }}" enctype="multipart/form-data">
							@csrf @method('patch')
							
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" value="{{ $data->nama }}">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" value="{{ $data->email }}">
							</div>
								<div class="form-group">
									<input type="file" name="foto" placeholder="Foto">
								</script>
							</div>
							<input type="submit" name="" value="Update" class="btn btn-info">
							{{-- <a href="{{ url('save') }}" class="btn btn-success">Simpan</a> --}}
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection