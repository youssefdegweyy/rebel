@extends('web_layouts.main')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('web_assets/css/form.css') }}"/>
@endsection
@section('content')
    <div class="form-content">
        <h2>Login</h2>
        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            @if (Session::has('error'))
                <span style="color: red"><b>Incorrect email or password</b></span>
            @endif
            <div class="form-item">
                <label for="email">Email : </label>
                <input type="email" id="email" name="email" required/>
            </div>

            <div class="form-item">
                <label for="passwd">Password : </label>
                <input type="password" id="passwd" name="password" required/>
            </div>
            <div class="form-item">
                <input type="submit" value="Login"/>
            </div>
        </form>
    </div>
@endsection
