@extends('customer.layouts.app')

@section('content')

<main role="main">

    <div class="container marketing">

            <hr class="featurette-divider">

            <div class="row justify-content-center">
                <div class="col-md-7">

                    <div class="card">
                        <div class="card-header text-center">
                            <h2>{{ __('Register Your Account') }}</h2>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username*') }}</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 offset-3 offset-lg-5">
                                        <div class="row">
                                            <div class="col-3 col-lg-2">
                                                <input class="form-check-input" type="radio" name="gender" value="0" required>
                                                <label class="form-check-label">Pria</label>
                                            </div>
                                            <div class="col-3">
                                                <input class="form-check-input" type="radio" name="gender" value="1" required>
                                                <label class="form-check-label">Wanita</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nohp" class="col-md-4 col-form-label text-md-right">{{ __('No HP Whatsapp*') }}</label>

                                    <div class="col-md-6">
                                        <input id="nohp" type="text" class="form-control{{ $errors->has('nohp') ? ' is-invalid' : '' }}" name="nohp" value="{{ old('nohp') }}" required autofocus>

                                        @if ($errors->has('nohp'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nohp') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail*') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address User*') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="address" rows="3" type="text"
                                                  class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                  name="address" required autofocus placeholder="Alamat Anda"></textarea>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <hr/>
                                <div class="form-group row">
                                    <label for="org_name" class="col-md-4 col-form-label text-md-right">{{ __('Organization Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="org_name" type="text" class="form-control" name="org_name" value="{{ old('org_name') }}" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="org_address" class="col-md-4 col-form-label text-md-right">{{ __('Organization Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="org_address" type="text" class="form-control" name="org_address" value="{{ old('org_address') }}" autofocus>

                                    </div>
                                </div>
                                <hr/>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-block btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
            <hr class="featurette-divider">
        </div>
</main>
@endsection
