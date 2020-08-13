@extends('layouts.master_app')

@section('title', 'Anggota')

@section('content')
<section class="content-header">
    <h1>
        Anggota
        <small>Kelola Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Anggota</li>
    </ol>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				@component('components.box')
					@slot('header')
						<a href="{{ route('anggota.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
						<a href="#" class="btn btn-success btn-sm"><i class="fa fa-file"></i> Import</a>
					@endslot
					@slot('right')
					@endslot
						@if(session('success'))
							@component('components.alert', ['type' => 'success'])
								{!! session('success') !!}
							@endcomponent
						@endif
						<div class="table-responsive">
							<table class="table table-hover table-bordered table-striped" id="table">
								<thead>
									<tr>
										<th width="30px">No</th>
										<th width="100px">ID Anggota</th>
										<th>Nama Anggota</th>
										<th>Jenis Kelamin</th>
										<th>Alamat</th>
										<th>No. Telepon</th>
										<th width="80px" class="text-center">Kelola</th>
									</tr>
								</thead>
								<tbody>
									@php $no = 1; @endphp
									@foreach($anggota as $row)
									<tr>
										<td>{{ $no++ }}</td>
										<td><span class="label label-success">{{ $row->kode }}</span></td>
										<td>{{ $row->nama }}</td>
										<td>{{ $row->gender }}</td>
										<td>{{ $row->alamat }}</td>
										<td>{{ $row->telepon }}</td>
										<td class="text-center">
											<form action="{{ route('anggota.destroy', $row->id) }}" method="POST">
												@csrf
												<input type="hidden" name="_method" value="DELETE">
												<a href="{{ route('anggota.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
												<button class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					@slot('footer')
					@endslot
				@endcomponent
			</div>
		</div>
	</div>
</section>
@endsection

@push('script')
<script>
	$(document).ready(function() {
		$('#table').DataTable({
			columnDefs: [
				{
					targets: [-1],
					orderable: false
				}
			]
		});
	})
</script>
@endpush