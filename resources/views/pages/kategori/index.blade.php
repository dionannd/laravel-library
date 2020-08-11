@extends('layouts.master_app')

@section('title', 'Kategori Buku')

@section('content')
<section class="content-header">
    <h1>
        Kategori
        <small>Kelola Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kategori</li>
    </ol>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				@component('components.box')
					@slot('header')
						<a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
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
										<th>Nama Kategori</th>
										<th>Deskripsi</th>
										<th width="120px" class="text-center">Kelola</th>
									</tr>
								</thead>
								<tbody>
									@php $no = 1; @endphp
									@foreach($kategori as $row)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $row->nama }}</td>
										<td>{{ $row->deskripsi }}</td>
										<td class="text-center">
											<form action="{{ route('kategori.destroy', $row->id) }}" method="POST">
												@csrf
												<input type="hidden" name="_method" value="DELETE">
												<a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
												<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
<script type="text/javascript">
	$(document).ready(function () {
		$('#table').DataTable({
			columnDefs: [
				{
					targets: [-1],
					orderable: false
				}
			]
		})
	})
</script>
@endpush