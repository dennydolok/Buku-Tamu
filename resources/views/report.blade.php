@extends('layouts.app')
@section('title','Guest Book')

@section('content')
<script language="javascript">
		function PrintDiv() {    
				 var divToPrint = document.getElementById('divToPrint');
				 var popupWin = window.open('', '_blank');
				 popupWin.document.open();
				 popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
				  popupWin.document.close();
					  }
	  </script>
	  
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@if (session('message'))
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
				@endif
				<br>
				<br>
                <br>
                <div><input type="button" onClick="PrintDiv();" class="btn btn-info" value="Print"></div>
				<div class="card">
					<div class="card-body" style="background-color:lightblue">
							<div id="divToPrint">
						<h4 class="card-title">Laporan</h4>

						<table class="table table-bordered table-striped table-hover" style="font-size:16px;">
							<thead>
								<tr>
									<td>No</td>
									<td>Nama Pemesan</td>
									<td>E-mail Pemesan</td>
                                    <td>Foto</td>
                                    <td>Tanggal</td>
									
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $field)
									<tr>
										<td>{{ $loop->index + 1 }}</td>
										<td>{{ $field->nama }}</td>
                                        <td>{{ $field->email }}</td>
                                        <td><img src="{{ asset('images/'.$field->foto) }}" style="width: 100px; height: 100px;"></td>
                                        <td>{{ $field->created_at }}</td>
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
	</div>
@endsection