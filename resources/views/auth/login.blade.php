@extends('layouts.app')
@section('body')
  <body class="login-page sidebar-collapse"> 
@endsection

@section('content')
<div class="page-header clear-filter" filter-color="trasparent">
    <div class="page-header-image" style="background-image:url({{ asset('img/header.jpg') }})"></div>
    <div class="content" style="margin-top: 10%;">
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">
            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card-header text-center">
                    <div class="logo-container">
                        <img src="{{ asset('img\logomain1.png') }}" alt="" id="logomain">
                    </div>
                </div>
              <div class="card-body">
                <div class="input-group no-border input-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="now-ui-icons users_circle-08"></i>
                        </span>
                    </div>
                    <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" 
                    name="matricula" value="{{ old('matricula') }}" required autocomplete="matricula" 
                    autofocus placeholder="Matricula">
                    @error('matricula')
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                    name="password" required autocomplete="current-password" placeholder="Senha">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>
                
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">
                        Entrar
                </button>
                <div class="pull-center">
                  <h6>
                    <a href="{{ route('register') }}" class="link">Criar Conta</a>
                  </h6>
                </div>
                
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>>
@endsection
