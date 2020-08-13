@extends('layouts.master_app')

@section('title', 'Tambah Buku')

@section('content')
<section class="content-header">
    <h1>
        Buku
        <small>Tambah Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Buku</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				@component('components.box')
					@slot('header')
						<a href="{{ route('buku.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
					@endslot
					@slot('right')
					@endslot
			            <form action="">
			              	<div class="box-body">
			                	<div class="form-group">
			                  		<label for="kode" class="control-label">ID Buku:</label>
		                    		<input type="text" name="kode" class="form-control" id="kode" value="{{ $kode }}" readonly>
			                	</div>
			                	<div class="form-group">
			                  		<label for="judul" class="control-label">Judul Buku:<span class="text-danger">*</span></label>
		                    		<input type="text" name="judul" class="form-control" id="judul">
			                	</div>
			                	<div class="form-group">
			                  		<label for="id_kategori" class="control-label">Kategori Buku:<span class="text-danger">*</span></label>
		                    		<select name="id_kategori" id="id_kategori" class="form-control select2">
		                    			<option value="">Pilih</option>
		                    			@foreach($kategori as $row)
		                    			<option value="{{ $row->id }}">{{ $row->nama }}</option>
		                    			@endforeach
		                    		</select>
			                	</div>
			                	<div class="form-group">
			                  		<label for="judul" class="control-label">Pengarang:<span class="text-danger">*</span></label>
		                    		<input type="text" name="judul" class="form-control" id="judul">
			                	</div>
			                	<div class="form-group">
			                  		<label for="judul" class="control-label">Penerbit:<span class="text-danger">*</span></label>
		                    		<input type="text" name="judul" class="form-control" id="judul">
			                	</div>
			                	<div class="form-group">
			                  		<label for="judul" class="control-label">Tahun Terbit:<span class="text-danger">*</span></label>
		                    		<input type="text" name="judul" class="form-control" id="judul">
			                	</div>
			              	</div>
		            @slot('footer')
			            	<div class="box-footer">
			                	<button type="Reset" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i> Reset</button>
			                	<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
			              	</div>
			            </form>
		            @endslot
				@endcomponent
			</div>
		</div>
	</div>
</section>
@endsection