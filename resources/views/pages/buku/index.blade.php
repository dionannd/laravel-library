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
	<div class="row">
		<div class="col-xs-12">
			@component('components.box')
				@slot('header')
					<a href="{{ route('buku.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
				@endslot
				@slot('right')
				@endslot
					<table class="table table-hover table-bordered table-striped" id="table">
						<thead>
							<tr>
								<th width="30px">No</th>
								<th width="100px">Kode</th>
								<th>Judul Buku</th>
								<th>Kategori</th>
								<th>Pengarang</th>
								<th>Penerbit</th>
								<th>Tahun</th>
								<th width="120px" class="text-center">Kelola</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				@slot('footer')
				@endslot
			@endcomponent
		</div>
	</div>
</section>
@endsection