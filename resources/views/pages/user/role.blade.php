@extends('layouts.master_app')

@section('title', 'Set Role')

@section('content')
<section class="content-header">
    <h1>
        Set Role
        <small>Kelola Akun</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Set Role</li>
    </ol>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<form action="{{ route('user.set_role', $user->id) }}" method="POST">
					@csrf
					<input type="hidden" name="_method" value="PUT">
					@component('components.box')
						@slot('header')
						@endslot
						@slot('right')
						@endslot
						<div class="table-responsive">
							<table class="table table-hover table-bordered">
								<thead>
									<tr>
										<th>Nama</th>
										<td width="10px">:</td>
										<td>{{ $user->name }}</td>
									</tr>
									<tr>
										<th>Username</th>
										<td width="10px">:</td>
										<td>{{ $user->username }}</td>
									</tr>
									<tr>
										<th>Email</th>
										<td width="10px">:</td>
										<td>{{ $user->Email }}</td>
									</tr>
									<tr>
										<th>Role</th>
										<td>:</td>
										<td>
											@foreach($roles as $row)
											<input type="radio" name="role" {{ $user->hasRole($row) ? 'checked':'' }} value="{{ $row }}"> {{ $row }} <br>
											@endforeach
										</td>
									</tr>
								</thead>
							</table>
						</div>
						@slot('footer')
						<div class="pull-right">
							<button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Kembali</button>
							<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
						</div>
						@endslot
					@endcomponent
				</form>
			</div>
		</div>
	</div>
</section>
@endsection