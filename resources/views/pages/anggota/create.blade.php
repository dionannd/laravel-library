@extends('layouts.master_app')

@section('title', 'Tambah Anggota')

@section('content')
<section class="content-header">
    <h1>
        Anggota
        <small>Tambah Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Anggota</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				@component('components.box')
					@slot('header')
						<a href="{{ route('anggota.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
					@endslot
					@slot('right')
					@endslot
			            <form action="">
			              	<div class="box-body">
			                	<div class="form-group">
			                  		<label for="kode" class="control-label">ID Anggota:<span class="text-danger">*</span></label>
		                    		<input type="text" name="kode" class="form-control" id="kode" value="" readonly>
			                	</div>
			                	<div class="form-group">
			                  		<label for="nama" class="control-label">Nama Lengkap:<span class="text-danger">*</span></label>
		                    		<input type="text" name="nama" class="form-control" id="nama">
			                	</div>
			                	<div class="form-group">
			                  		<label for="id_kategori" class="control-label">Jenis Kelamin:<span class="text-danger">*</span></label>
		                    		<select name="id_kategori" id="id_kategori" class="form-control">
		                    			<option value="">Pilih</option>
		                    			<option value="Laki-Laki">Laki-Laki</option>
		                    			<option value="Perempuan">Perempuan</option>
		                    		</select>
			                	</div>
			                	<div class="form-group">
			                  		<label for="alamat" class="control-label">Alamat:<span class="text-danger">*</span></label>
		                    		<textarea name="alamat" id="alamat" class="form-control" cols="3" rows="3"></textarea>
			                	</div>
			                	<div class="form-group">
			                  		<label for="telepon" class="control-label">No. Telepon:<span class="text-danger">*</span></label>
		                    		<input type="text" name="telepon" class="form-control" id="telepon">
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