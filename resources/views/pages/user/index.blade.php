@extends('layouts.master_app')

@section('title', 'Akun Pengguna')

@section('content')
<section class="content-header">
    <h1>
        Akun Pengguna
        <small>Kelola Akun</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Akun Pengguna</li>
    </ol>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				@component('components.box')
					@slot('header')
						<a href="{{ route('user.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
					@endslot
					@slot('right')
					@endslot
						<div class="table-responsive">
							<table class="table table-hover table-bordered table-striped" id="table">
								<thead>
									<tr>
										<th width="30px">No</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Email</th>
										<th>Role</th>
										<th>Status</th>
										<th width="120px" class="text-center">Kelola</th>
									</tr>
								</thead>
								<tbody>
									@php $no = 1; @endphp
									@forelse($user as $row)
									<tr>
										<td>{{ $no++ }}</td>
										<td>{{ $row->name }}</td>
										<td>{{ $row->username }}</td>
										<td>{{ $row->email }}</td>
										<td>
											@foreach($row->getRoleNames() as $role)
											<label class="label label-info">{{ $role }}</label>
											@endforeach
										</td>
										<td>
											@if($row->status)
											<label class="label label-success">Aktif</label>
											@else
											<label class="label label-default">Suspend</label>
											@endif
										</td>
										<td class="text-center">
											<form action="{{ route('user.destroy', $row->id) }}" method="POST">
												@csrf
												<input type="hidden" name="_method" value="DELETE">
												<a href="{{ route('user.role', $row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-user-secret"></i></a>
												<a href="{{ route('user.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
												<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
											</form>
										</td>
									</tr>
									@empty
									@endforelse
								</tbody>
							</table>
						</div>
					@slot('footer')
					@endslot
				@endcomponent
			</div>
		</div>
	</div>
</section>
@endsection

@push('script')
<script type="text/javascript">
	$(document).ready(function () {
		$('#table').DataTable({
			columnDefs: [
				{
					targets: [-1],
					orderable: false
				}
			]
		})
	})
</script>
@endpush