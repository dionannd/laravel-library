@extends('layouts.master_app')

@section('title', 'Sirkulasi')

@section('content')
<section class="content-header">
    <h1>
        Sirkulasi
        <small>Sirkulasi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sirkulasi</li>
    </ol>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				@component('components.box')
					@slot('header')
						<a href="{{ route('sirkulasi.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
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
										<th width="100px">ID SKL</th>
										<th>Buku</th>
										<th>Peminjam</th>
										<th>Tanggal Pinjam</th>
										<th>Tanggal Kembali</th>
										<th>Status</th>
										<th width="120px" class="text-center">Kelola</th>
									</tr>
								</thead>
								<tbody>
									@php $no = 1; @endphp
									@foreach($sirkulasi as $row)
									<tr>
										<td>{{ $no++ }}</td>
										<td><span class="label label-success">{{ $row->kode }}</span></td>
										<td>{{ $row->buku->judul }}</td>
										<td>{{ $row->anggota->nama }}</td>
										<td><span class="label label-default">{{ Carbon\Carbon::parse($row->tgl_pinjam)->format('d-m-Y') }}</span></td>
										<td><span class="label label-default">{{ Carbon\Carbon::parse($row->tgl_kembali)->format('d-m-Y') }}</span></td>
										@if($row->tgl_pinjam <= $row->tgl_kembali)
										<td><span class="label label-warning">Masa Pinjam</span></td>
										@elseif($row->tgl_pinjam >= $row->tgl_kembali)
										<td><span class="label label-danger">Denda</span></td>
										@endif
										<td class="text-center">
											<form action="{{ route('sirkulasi.destroy', $row->id) }}" method="POST">
												@csrf
												<input type="hidden" name="_method" value="DELETE">
												<a href="{{ route('sirkulasi.edit', $row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-clock-o"></i></a>
												<button class="btn btn-danger btn-sm" id="delete"><i class="fa fa-check"></i></button>
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