@extends('layouts.master_app')

@section('title', 'Form Akun')

@section('content')
<section class="content-header">
    <h1>
        Akun
        <small>Kelola Akun</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Akun</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				@component('components.box')
					@slot('header')
						<a href="{{ route('user.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
					@endslot
					@slot('right')
					@endslot
			            <form action="{{ route('user.store') }}" method="POST">
			            	@csrf
			              	<div class="box-body">
			                	<div class="form-group">
			                  		<label for="name" class="control-label">Nama:<span class="text-danger">*</span></label>
		                    		<input type="text" name="name" class="form-control" id="name" required>
			                	</div>
			                	<div class="form-group">
			                  		<label for="username" class="control-label">Username:<span class="text-danger">*</span></label>
		                    		<input type="text" name="username" class="form-control" id="username" required>
			                	</div>
			                	<div class="form-group">
			                  		<label for="email" class="control-label">Email:<span class="text-danger">*</span></label>
		                    		<input type="email" name="email" class="form-control" id="email" required>
			                	</div>
			                	<div class="form-group">
			                  		<label for="password" class="control-label">Password:<span class="text-danger">*</span></label>
		                    		<input type="password" name="password" class="form-control" id="password" required>
			                	</div>
			                	<div class="form-group">
			                  		<label for="role" class="control-label">Role:<span class="text-danger">*</span></label>
		                    		<select name="role" id="role" class="form-control" required>
		                    			<option value="">-Pilih-</option>
		                    			@foreach($role as $row)
		                    			<option value="{{ $row->name }}">{{ $row->name }}</option>
		                    			@endforeach
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