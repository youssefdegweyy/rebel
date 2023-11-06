@extends('web_layouts.main')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('web_assets/css/form.css') }}"/>
@endsection
@section('content')
    <div class="form-content">
        <h2>Join REBEL Family</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-item">
                <label for="fname">First Name : </label>
                <input type="text" id="fname" name="first_name" required value="{{ old('first_name') }}"/>
                @if ($errors->has('first_name'))
                    <span
                        style="color:red"><b> {{ $errors->first('first_name') }}</b></span>
                @endif
            </div>

            <div class="form-item">
                <label for="lname">Last Name : </label>
                <input type="text" id="lname" name="last_name" required value="{{ old('last_name') }}"/>
                @if ($errors->has('last_name'))
                    <span
                        style="color:red"><b> {{ $errors->first('last_name') }}</b></span>
                @endif
            </div>

            <div class="form-item">
                <label for="mobile">Mobile Number : </label>
                <input type="text" id="mobile" name="mobile" required value="{{ old('mobile') }}"/>
                @if ($errors->has('mobile'))
                    <span
                        style="color:red"><b> {{ $errors->first('mobile') }}</b></span>
                @endif
            </div>

            <div class="form-item">
                <label for="bdate">Birthdate : </label>
                <input type="date" id="bdate" name="dob" required value="{{ old('dob') }}"/>
                @if ($errors->has('dob'))
                    <span
                        style="color:red"><b> {{ $errors->first('dob') }}</b></span>
                @endif
            </div>

            <div class="form-item">
                <label for="email">Email : </label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}"/>
                @if ($errors->has('email'))
                    <span
                        style="color:red"><b> {{ $errors->first('email') }}</b></span>
                @endif
            </div>

            <div class="form-item">
                <label for="passwd">Password : </label>
                <input type="password" id="passwd" name="password" required/>
                @if ($errors->has('password'))
                    <span
                        style="color:red"><b> {{ $errors->first('password') }}</b></span>
                @endif
            </div>

            <div class="form-item">
                <label for="confirm-passwd">Confirm Password : </label>
                <input
                    type="password"
                    id="confirm-passwd"
                    name="password_confirmation"
                    required
                />
            </div>

            <div class="form-item">
                <label for="address">Address : </label>
                <input type="address" id="address" name="address" required value="{{ old('address') }}"/>
                @if ($errors->has('address'))
                    <span
                        style="color:red"><b> {{ $errors->first('address') }}</b></span>
                @endif
            </div>

            <div class="form-item">
                <label for="country">Select a Country:</label>
                <select name="country" class="form-control" id="country">
                    <option value="0" label="Select a country ... " selected="selected">
                        Select a country ...
                    </option>
                </select>
                @if ($errors->has('country'))
                    <span
                        style="color:red"><b> {{ $errors->first('country') }}</b></span>
                @endif
            </div>

            <div class="form-item">
                <label for="city">Select a City:</label>
                <select name="city" class="form-control" id="city">
                    <option value="0" label="Select a city ... " selected="selected">
                        Select a city ...
                    </option>
                </select>
                @if ($errors->has('city'))
                    <span
                        style="color:red"><b> {{ $errors->first('city') }}</b></span>
                @endif
            </div>
            @if (Session::has('error'))
                <script>
                    alert("Error in registration, please try again.");
                </script>
            @endif

            <div class="form-item">
                <input type="submit"/>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('web_assets/js/countries.js')}}"></script>
@endsection
