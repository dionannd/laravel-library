@extends('layouts.master_app')

@section('title', 'Form Buku')

@section('content')
<section class="content-header">
    <h1>
        Buku
        <small>Kelola Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Buku</a></li>
        @php $route = isset($buku) ? 'Edit' : 'Tambah' @endphp
        <li class="active">{{ $route }}</li>
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
						@php $route = isset($buku) ? route('buku.update', $buku->id) : route('buku.store') @endphp
			            <form action="{{ $route }}" method="POST">
			            	@csrf
			            	@if (isset($buku)) @method('PUT') @endif
			              	<div class="box-body">
			                	<div class="form-group">
			                  		<label for="kode" class="control-label">ID Buku:</label>
		                    		<input type="text" name="kode" class="form-control" id="kode" value="{{ $kode }}" readonly>
			                	</div>
			                	<div class="form-group">
			                  		<label for="judul" class="control-label">Judul Buku:<span class="text-danger">*</span></label>
		                    		<input type="text" name="judul" class="form-control" id="judul" value="{{ is_null(old('judul')) ? (isset($buku) ? $buku->judul : null) : old('judul') }}" required>
			                	</div>
			                	<div class="form-group">
			                  		<label for="id_kategori" class="control-label">Kategori Buku:<span class="text-danger">*</span></label>
		                    		<select name="id_kategori" id="id_kategori" class="form-control select2" required>
		                    			<option value="">Pilih</option>
		                    			<optgroup label="Kategori">
		                    			@foreach($kategori as $row)
		                    				<option value="{{ $row->id }}" @if(isset($buku)) {{ $buku->id_kategori == $row->id ? 'selected' : '' }} @endif>{{ $row->nama }}</option>
		                    			@endforeach
		                    			</optgroup>
		                    		</select>
			                	</div>
			                	<div class="form-group">
			                  		<label for="pengarang" class="control-label">Pengarang:<span class="text-danger">*</span></label>
		                    		<input type="text" name="pengarang" class="form-control" id="pengarang" value="{{ is_null(old('pengarang')) ? (isset($buku) ? $buku->pengarang : null) : old('pengarang') }}" required>
			                	</div>
			                	<div class="form-group">
			                  		<label for="penerbit" class="control-label">Penerbit:<span class="text-danger">*</span></label>
		                    		<input type="text" name="penerbit" class="form-control" id="penerbit" value="{{ is_null(old('penerbit')) ? (isset($buku) ? $buku->penerbit : null) : old('penerbit') }}" required>
			                	</div>
			                	<div class="form-group">
			                  		<label for="tahun" class="control-label">Tahun Terbit:<span class="text-danger">*</span></label>
		                    		<input type="text" name="tahun" class="form-control" id="tahun" value="{{ is_null(old('tahun')) ? (isset($buku) ? $buku->tahun : null) : old('tahun') }}" required>
			                	</div>
			                	<div class="form-group">
			                  		<label for="id_letak" class="control-label">Letak Buku:<span class="text-danger">*</span></label>
		                    		<select name="id_letak" id="id_letak" class="form-control select2" required>
		                    			<option value="">Pilih</option>
		                    			<optgroup label="Letak Tempat">
		                    			@foreach($letak as $row)
		                    				<option value="{{ $row->id }}" @if(isset($buku)) {{ $buku->id_letak == $row->id ? 'selected' : '' }}@endif>{{ $row->nama }}</option>
		                    			@endforeach
		                    			</optgroup>
		                    		</select>
			                	</div>
			              	</div>
		            @slot('footer')
			            	<div class="box-footer">
			                	<button type="Reset" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i> Reset</button>
			                	<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
			              	</div>
			            </form>
		            @endslot
				@endcomponent
			</div>
		</div>
	</div>
</section>
@endsection