@extends('layouts.master_app')

@section('title', 'Form Anggota')

@section('content')
<section class="content-header">
    <h1>
        Anggota
        <small>Kelola Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Anggota</a></li>
        @php $route = isset($anggota) ? 'Edit' : 'Tambah' @endphp
        <li class="active">{{ $route }}</li>
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
						@php $route = isset($anggota) ? route('anggota.update', $anggota->id) : route('anggota.store') @endphp
			            <form action="{{ $route }}" method="POST">
			            	@csrf
			            	@if (isset($anggota)) @method('PUT') @endif
			              	<div class="box-body">
			                	<div class="form-group">
			                  		<label for="kode" class="control-label">ID Anggota:</label>
		                    		<input type="text" name="kode" class="form-control" id="kode" value="{{ $kode }}" required readonly>
			                	</div>
			                	<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			                  		<label for="nama" class="control-label">Nama Lengkap:<span class="text-danger">*</span></label>
		                    		<input type="text" name="nama" class="form-control" id="nama" value="{{ is_null(old('nama')) ? (isset($anggota) ? $anggota->nama : null) : old('nama') }}" required>
			                	</div>
			                	<div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
			                  		<label for="gender" class="control-label">Jenis Kelamin:<span class="text-danger">*</span></label>
		                    		<select name="gender" id="gender" class="form-control" required>
		                    			<option value="">Pilih</option>
		                    			<option value="Laki-Laki" @if(isset($anggota)) {{ $anggota->gender == 'Laki-Laki' ? 'selected' : '' }} @endif>Laki-Laki
		                    			</option>
		                    			<option value="Perempuan" @if(isset($anggota)) {{ $anggota->gender == 'Perempuan' ? 'selected' : '' }} @endif>Perempuan</option>
		                    		</select>
			                	</div>
			                	<div class="form-group {{ $errors->has('telepon') ? ' has-error' : '' }}">
			                  		<label for="telepon" class="control-label">No. Telepon:<span class="text-danger">*</span> <span class="text-muted">(Format: 628xxx)</span></label>
		                    		<input type="text" name="telepon" class="form-control" id="telepon" value="{{ is_null(old('telepon')) ? (isset($anggota) ? $anggota->telepon : null) : old('telepon') }}" required>
			                	</div>
			                	<div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
			                  		<label for="alamat" class="control-label">Alamat:<span class="text-danger">*</span></label>
		                    		<textarea name="alamat" id="alamat" class="form-control" cols="3" rows="3" required>{{ is_null(old('alamat')) ? (isset($anggota) ? $anggota->alamat : null) : old('alamat') }}</textarea>
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