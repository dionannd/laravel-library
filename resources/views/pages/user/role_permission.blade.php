@extends('layouts.master_app')

@section('title', 'Role Permission')

@section('css')
<style type="text/css">
	.tab-pane{
		height: 150px;
		overflow-y: scroll;
	}
</style>
@endsection

@section('content')
<section class="content-header">
    <h1>
        Role Permission
        <small>Kelola Akun</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Role Permission</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-4">
			@component('components.box')
				@slot('header')
					Tambah Permission untuk Role
				@endslot
				@slot('right')
				@endslot
					<form role="form" action="{{ route('user.add_permission') }}" method="POST">
						@csrf
						<div class="form-group">
	                  		<label for="name" class="control-label">Nama</label>
                    		<input type="text" name="name" class="form-control" id="name" required>
	                	</div>
				@slot('footer')
						<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
	                	<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
					</form>
				@endslot
			@endcomponent
		</div>
		<div class="col-xs-8">
			@component('components.box')
				@slot('header')
					Set Permission untuk Role
				@endslot
				@slot('right')
				@endslot
					@if(session('success'))
						@component('components.alert', ['type' => 'success'])
							{!! session('success') !!}
						@endcomponent
					@endif
					<form action="{{ route('user.role_permission') }}" method="GET">
						<div class="form-group">
	                  		<label for="role">Role</label>
							<div class="input-group col-md-6">
		                  		<select name="role" id="role" class="form-control">
		                  			<option value="">-Pilih-</option>
		                  			@foreach($roles as $row)
		                  			<option value="{{ $row }}" {{ request()->get('role') == $row ? 'selected':'' }}>{{ $row }}</option>
		                  			@endforeach
		                  		</select>
		                  		<span class="input-group-btn">
		                  			<button class="btn btn-warning">Check</button>
		                  		</span>
		                	</div>
						</div>
					</form>
					@if(!empty($permissions))
						<form action="{{ route('user.setRolePermission', request()->get('role')) }}" method="POST">
							@csrf
							<input type="hidden" name="_method" value="PUT">
							<div class="form-group">
								<div class="nav-tabs-custom">
									<ul class="nav nav-tabs">
										<li class="active">
											<a href="#tab1" data-toggle="tab">Permission</a>
										</li>
									</ul>
									<div class="tab-pane active" id="tab1">
										@php $no = 1; @endphp
										@foreach($permissions as $key => $row)
										<input type="checkbox" name="permission[]" class="minimal-red" value="{{ $row }}" {{ in_array($row, $hasPermission) ? 'checked':'' }}> {{ $row }} <br>
										{{-- @if($no++%4 == 0)
										<br>
										@endif --}}
										@endforeach
									</div>
								</div>
							</div>
							<div>
								<button class="btn btn-primary"><i class="fa fa-cog"></i> Set permission</button>
							</div>
						</form>
					@endif
				@slot('footer')
				@endslot
			@endcomponent
		</div>
	</div>
</section>
@endsection