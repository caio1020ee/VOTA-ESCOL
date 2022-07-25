@extends('layouts.app')
@section('body')
  <body class="login-page sidebar-collapse"> 
@endsection
@section('content')
<div class="page-header clear-filter" filter-color="trasparent">
    <div class="page-header-image" style="background-image:url({{ asset('img/header.jpg') }})"></div>
    <div class="content" style="margin-top: 10em;">
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">
            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="card-header text-center">
                    
                    <p><h3>Cadastro</h3></p>
                </div>
                <div class="card-body">
                     <!-- Nome-->
                    <div class="input-group no-border input-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="now-ui-icons users_circle-08"></i>
                            </span>
                        </div>
                        <input id="name" type="text" class="form-control text-white @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nome">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Sobreome-->   
                    <div class="input-group no-border input-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            <i class="now-ui-icons users_circle-08"></i>
                            </span>
                        </div>
                        <input id="sobrenome" type="text" class="form-control text-white @error('sobrenome') is-invalid @enderror" name="sobrenome" value="{{ old('sobrenome') }}" required autocomplete="sobrenome" autofocus placeholder="Sobrenome">

                        @error('sobrenome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- email -->
                    <div class="input-group no-border input-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Matricula -->
                    <div class="input-group no-border input-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                        </div>
                        <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ old('matricula') }}" required autocomplete="matricula" placeholder="Matricula">

                        @error('matricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Password -->
                    <div class="input-group no-border input-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            </span>
                        </div>
                    
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Senha">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group no-border input-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            </span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar senha">
                    </div>

                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">
                        Confirmar
                    </button>
                    <div class="pull-center">
                        <h6>
                            <a href="{{ route('login') }}" class="link text-white">Já tenho uma conta</a>
                        </h6>
                    </div>
                
            </form>
                </div>
          </div>
        </div>
      </div>
    </div>










@endsection
