@extends('layouts.master_app')

@section('title', 'Buku')

@section('content')
<section class="content-header">
    <h1>
        Buku
        <small>Kelola Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Buku</li>
    </ol>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				@component('components.box')
					@slot('header')
						<a href="{{ route('buku.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
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
										<th width="100px">ID Buku</th>
										<th>Judul Buku</th>
										<th>Kategori</th>
										<th>Pengarang</th>
										<th>Penerbit</th>
										<th>Letak</th>
										<th width="80px" class="text-center">Kelola</th>
									</tr>
								</thead>
								<tbody>
									@php $no = 1; @endphp
									@foreach($buku as $row)
									<tr>
										<td>{{ $no++ }}</td>
										<td><span class="label label-success">{{ $row->kode }}</span></td>
										<td>{{ $row->judul }}</td>
										<td>{{ $row->kategori->nama }}</td>
										<td>{{ $row->pengarang }}</td>
										<td>{{ $row->penerbit }}</td>
										<td>{{ $row->letak->nama }}</td>
										<td class="text-center">
											<form action="{{ route('buku.destroy', $row->id) }}" method="POST">
												@csrf
												<input type="hidden" name="_method" value="DELETE">
												<a href="{{ route('buku.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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
@stop

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