@extends('layouts.master_app')

@section('title', 'Form Kategori')

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
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			@component('components.box')
				@slot('header')
					Tambah Buku
				@endslot
				@slot('right')
					<button class="btn btn-warning" onclick="history.go(-1);"><i class="fa fa-arrow-left"></i> Kembali</button>
				@endslot
		            <form class="form-horizontal">
		              	<div class="box-body">
		                	<div class="form-group">
		                  		<label for="kode" class="col-sm-2 control-label">Kode Buku</label>
		                  		<div class="col-sm-10">
		                    		<input type="text" name="kode" class="form-control" id="kode" value="{{ $kode }}" readonly>
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		<label for="judul" class="col-sm-2 control-label">Judul Buku</label>
		                  		<div class="col-sm-10">
		                    		<input type="text" name="judul" class="form-control" id="judul">
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		<label for="id_kategori" class="col-sm-2 control-label">Kategori Buku</label>
		                  		<div class="col-sm-10">
		                    		<select name="id_kategori" id="id_kategori" class="form-control">
		                    			<option value="">Pilih</option>
		                    		</select>
		                  		</div>
		                	</div>
		              	</div>
		            </form>
	            @slot('footer')
	            	<div class="box-footer">
	                	<button type="Reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
	                	<button type="submit" class="btn btn-primary">Simpan</button>
	              	</div>
	            @endslot
			@endcomponent
		</div>
	</div>
</section>
@endsection