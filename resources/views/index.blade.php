@extends('layouts.app')
@section('title','Guest Book')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@if (session('message'))
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
				@endif

				<br>
				<a href="{{ url('create') }}" class="btn btn-success" style="">Tambah Tamu</a>
				<a href="{{ url('report') }}" class="btn btn-info" style="">Laporan</a>
				<br>
				<br>
				<div class="card">
					<div class="card-body" style="background-color:lightblue">
						<h4 class="card-title">Daftar Tamu</h4>

						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<td>No</td>
									<td>Nama Pemesan</td>
									<td>E-mail Pemesan</td>
									<td>Foto</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $field)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td>{{ $field->nama }}</td>
										<td>{{ $field->email }}</td>
										<td><img src="{{ asset('images/'.$field->foto) }}" style="width: 100px; height: 100px;"></td>
										<td> 
											<a onclick="return confirm('Delete?')" href="{{ url('hapus/'.$field->id) }} " class="btn btn-warning">Hapus</a>
											<a href=" {{ url('edit/'.$field->id) }} " class="btn btn-info">Edit</a>
										</td>
										{{-- <td>{{ $field->nama }}</td> --}}
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $data->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection