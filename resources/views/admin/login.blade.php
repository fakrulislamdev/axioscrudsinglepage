@extends('layouts.admin')

@section('admin_body')
        <section class="bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="card-title text-center">
                                                <img src="assets/images/logo_sm_2.png" alt="" class="">
                                                <h5 class="mt-3 text-danger"><b>Welcome to AR-SOFTWARE</b></h5>
                                            </div>  
                                            <form class="form mt-5 contact-form" action="{{ route('login') }}" method="POST">
                                            @csrf
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-line @error('email') is-invalid @enderror" type="Email" id="email" placeholder="Email Address" value="{{ old('email') }}" name="email" required autocomplete="email" autofocus>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <input id="password" class="form-control form-control-line  @error('password') is-invalid @enderror" type="password" placeholder="Password"  name="password" required autocomplete="current-password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-12">
                                                        <label class="cr-styled">
                                                            <input type="checkbox" checked class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                            <i class="fa"></i> 
                                                            Remember me
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-12 mt-4">
                                                        <button class="btn btn-primary btn-block" type="submit">Admin Log In</button>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12 mt-4 text-center">
                                                        @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}"><i class="fa fa-lock m-r-5"></i> Forgot password?</a>
                                                        @endif
                                                    </div>
                                                </div>

                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection