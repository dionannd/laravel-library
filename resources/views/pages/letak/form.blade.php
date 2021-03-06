@extends('layouts.master_app')

@section('title', 'Form Letak')

@section('content')
<section class="content-header">
    <h1>
        Letak
        <small>Kelola Data</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Letak</a></li>
        @php $route = isset($letak) ? 'Edit' : 'Tambah' @endphp
        <li class="active">{{ $route }}</li>
    </ol>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				@component('components.box')
					@slot('header')
						<a href="{{ route('letak.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
					@endslot
					@slot('right')
					@endslot
						@php $route = isset($letak) ? route('letak.update', $letak->id) : route('letak.store') @endphp
			            <form action="{{ $route }}" method="POST">
			            	@csrf
			            	@if (isset($letak)) @method('PUT') @endif
			              	<div class="box-body">
			                	<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			                  		<label for="nama" class="control-label">Nama Tempat:<span class="text-danger">*</span></label>
		                    		<input type="text" name="nama" id="nama" class="form-control" value="{{ is_null(old('nama')) ? (isset($letak) ? $letak->nama : null) : old('nama') }}" required>
			                  		@if ($errors->has('nama'))
	                                    <span class="help-block" role="alert">
	                                        {{ $errors->first('nama') }}
	                                    </span>
	                                @endif
			                	</div>
			                	<div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
			                  		<label for="deskripsi" class="control-label">Deskripsi:<span class="text-danger">*</span></label>
		                    		<textarea name="deskripsi" id="deskripsi" cols="3" rows="3" class="form-control {{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" required>{{ is_null(old('deskripsi')) ? (isset($letak) ? $letak->deskripsi : null) : old('deskripsi') }}</textarea>
			                  		@if ($errors->has('deskripsi'))
	                                    <span class="help-block" role="alert">
	                                        {{ $errors->first('deskripsi') }}
	                                    </span>
	                                @endif
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

@push('script')
<script type="text/javascript">
	$(document).ready(function() {
		
	})
</script>
@endpush