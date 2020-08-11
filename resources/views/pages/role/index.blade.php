@extends('layouts.master_app')

@section('title', 'Role')

@section('content')
<section class="content-header">
    <h1>
        Role
        <small>Kelola Akun</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Role</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-4">
			@component('components.box')
				@slot('header')
					Tambah Role
				@endslot
				@slot('right')
				@endslot
					<form role="form" action="{{ route('role.store') }}" method="POST">
						@csrf
						<div class="form-group">
	                  		<label for="name" class="col-sm-2 control-label">Role</label>
	                  		<div class="col-sm-10">
	                    		<input type="text" name="name" class="form-control" id="name" required>
	                  		</div>
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
					List Role
				@endslot
				@slot('right')
				@endslot
					@if(session('success'))
						@component('components.alert', ['type' => 'success'])
							{!! session('success') !!}
						@endcomponent
					@endif
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th width="30px">#</th>
								<th>Role</th>
								<th>Guard</th>
								<th>Pembuatan</th>
								<th width="100px" class="text-center">Kelola</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 1; @endphp
							@forelse($role as $row)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $row->name }}</td>
								<td>{{ $row->guard_name }}</td>
								<td>{{ $row->created_at }}</td>
								<td class="text-center">
									<form action="{{ route('role.destroy', $row->id) }}" method="POST">
										@csrf
										<input type="hidden" name="_method" value="DELETE">
										<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
									</form>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="5" class="text-center">Data Kosong</td>
							</tr>
							@endforelse
						</tbody>
					</table>
					<div class="float-right">
						{!! $role->links() !!}
					</div>
				@slot('footer')
				@endslot
			@endcomponent
		</div>
	</div>
</section>
@endsection