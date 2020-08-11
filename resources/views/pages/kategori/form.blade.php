@extends('layouts.master_app')

@section('title', 'Form Kategori')

@section('content')
<section class="content-header">
    <h1>
        Kategori
        <small>Kelola Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kategori</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				@component('components.box')
					@slot('header')
						<a href="{{ route('kategori.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
					@endslot
					@slot('right')
					@endslot
						@php $route = isset($kategori) ? route('kategori.update',['id' => $kategori->id]) : route('kategori.store') @endphp
			            <form class="form-horizontal" action="{{ $route }}" method="POST">
			            	@if (isset($kategori)) <input type="hidden" name="_method" value="PUT"> @endif
			            	@csrf
			              	<div class="box-body">
			                	<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			                  		<label for="nama" class="col-sm-2 control-label">Nama Kategori</label>
			                  		<div class="col-sm-10">
			                    		<input type="text" name="nama" id="nama" class="form-control" value="{{ is_null(old('nama')) ? (isset($kategori) ? $kategori->nama : null) : old('nama') }}">
				                  		@if ($errors->has('nama'))
		                                    <span class="help-block" role="alert">
		                                        {{ $errors->first('nama') }}
		                                    </span>
		                                @endif
			                  		</div>
			                	</div>
			                	<div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
			                  		<label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
			                  		<div class="col-sm-10">
			                    		<textarea name="deskripsi" id="deskripsi" cols="3" rows="3" class="form-control {{ $errors->has('deskripsi') ? ' is-invalid' : '' }}">{{ is_null(old('deskripsi')) ? (isset($kategori) ? $kategori->deskripsi : null) : old('deskripsi') }}</textarea>
				                  		@if ($errors->has('name'))
		                                    <span class="help-block" role="alert">
		                                        <strong>{{ $errors->first('deskripsi') }}</strong>
		                                    </span>
		                                @endif
			                  		</div>
			                	</div>
			              	</div>
		            @slot('footer')
			            	<div class="box-footer">
			                	<button type="Reset" class="btn btn-danger btn-sm" id="reset"><i class="fa fa-refresh"></i> Reset</button>
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