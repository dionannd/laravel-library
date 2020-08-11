@extends('layouts.master_app')

@section('title', 'Tambah Akun')

@section('content')
<section class="content-header">
    <h1>
        Akun
        <small>Tambah Akun</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Akun</a></li>
        <li class="active">Tambah</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			@component('components.box')
				@slot('header')
					Form Akun
				@endslot
				@slot('right')
					<button class="btn btn-warning btn-sm" onclick="history.go(-1);"><i class="fa fa-arrow-left"></i> Kembali</button>
				@endslot
		            <form class="form-horizontal" action="{{ route('user.store') }}" method="POST">
		            	@csrf
		              	<div class="box-body">
		                	<div class="form-group">
		                  		<label for="nama" class="col-sm-2 control-label">Nama</label>
		                  		<div class="col-sm-10">
		                    		<input type="text" name="nama" class="form-control" id="nama" required>
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		<label for="username" class="col-sm-2 control-label">Username</label>
		                  		<div class="col-sm-10">
		                    		<input type="text" name="username" class="form-control" id="username" required>
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		<label for="email" class="col-sm-2 control-label">Email</label>
		                  		<div class="col-sm-10">
		                    		<input type="email" name="email" class="form-control" id="email" required>
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		<label for="password" class="col-sm-2 control-label">Password</label>
		                  		<div class="col-sm-10">
		                    		<input type="password" name="password" class="form-control" id="password" required>
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		<label for="role" class="col-sm-2 control-label">Role</label>
		                  		<div class="col-sm-10">
		                    		<select name="role" id="role" class="form-control" required>
		                    			<option value="">-Pilih-</option>
		                    			@foreach($role as $row)
		                    			<option value="{{ $row->name }}">{{ $row->name }}</option>
		                    			@endforeach
		                    		</select>
		                  		</div>
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
</section>
@endsection