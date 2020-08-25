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
        <li><a href="#">Sirkulasi</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				@component('components.box')
					@slot('header')
						<a href="{{ route('sirkulasi.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
					@endslot
					@slot('right')
					@endslot
						<form action="{{ route('sirkulasi.store') }}" method="POST">
							@csrf
							<div class="box-body">
								<div class="form-group {{ $errors->has('kode') ? ' has-error' : '' }}">
			                  		<label for="kode" class="control-label">ID Sirkulasi:</label>
		                    		<input type="text" name="kode" class="form-control" id="kode" value="{{ $kode }}" required readonly>
		                    		@if ($errors->has('kode'))
	                                    <span class="help-block" role="alert">
	                                        {{ $errors->first('kode') }}
	                                    </span>
	                                @endif
			                	</div>
			                	<div class="form-group {{ $errors->has('id_buku') ? ' has-error' : '' }}">
			                  		<label for="id_buku" class="control-label">Buku:<span class="text-danger">*</span></label>
		                    		<select name="id_buku" id="id_buku" class="form-control select2" required>
		                    			<option value="">Pilih</option>
		                    			<optgroup label="Judul Buku">
		                    			@foreach($buku as $row)
		                    				<option value="{{ $row->id }}">{{ $row->judul }}</option>
		                    			@endforeach
		                    			</optgroup>
		                    		</select>
		                    		@if ($errors->has('id_buku'))
	                                    <span class="help-block" role="alert">
	                                        {{ $errors->first('id_buku') }}
	                                    </span>
	                                @endif
			                	</div>
			                	<div class="form-group {{ $errors->has('id_anggota') ? ' has-error' : '' }}">
			                  		<label for="id_anggota" class="control-label">Peminjam:<span class="text-danger">*</span></label>
		                    		<select name="id_anggota" id="id_anggota" class="form-control select2" required>
		                    			<option value="">Pilih</option>
		                    			<optgroup label="Anggota">
		                    			@foreach($anggota as $row)
		                    				<option value="{{ $row->id }}">{{ $row->nama }}</option>
		                    			@endforeach
		                    			</optgroup>
		                    		</select>
		                    		@if ($errors->has('id_anggota'))
	                                    <span class="help-block" role="alert">
	                                        {{ $errors->first('id_anggota') }}
	                                    </span>
	                                @endif
			                	</div>
			                	<div class="form-group">
			                  		<label for="tgl_pinjam" class="control-label">Tanggal Pinjam:</label>
		                    		<input type="text" class="form-control" id="tgl_pinjam" value="{{ $pinjam->format('d-m-Y') }}" required readonly>
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
@stop