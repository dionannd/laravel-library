@extends('layouts.master_login')

@section('title', 'Login')

@section('content')

<div class="login-box">
    <div class="login-logo">
        <a href="javascript:void(0);"><b>my</b>Library</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Masuk untuk memulai sesi kamu</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @if (session('error'))
                @component('components.alert', ['type' => 'danger'])
                    {{ session('error') }}
                @endcomponent
            @endif
            <div class="form-group has-feedback @error('email') has-error @enderror">
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback">{{ $errors->first('password') }}</span>
            </div>
            <div class="form-group has-feedback @error('password') has-error @enderror">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback">{{ $errors->first('password') }}</span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
