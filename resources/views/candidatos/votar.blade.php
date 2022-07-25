@extends('layouts.app')
@section('style')
    
@endsection
@section('body')
  <body class="login-page sidebar-collapse"> 
@endsection
@section('content')
  <div class="page-header clear-filter" filter-color="trasparent">
    <div class="page-header-image" style="background-image:url({{ asset('img/header.jpg') }})">
    </div>
    <div class="content" style="margin-top: 10%;">

      @if(strtotime($dataAtual) != strtotime($data))
        <div class="container">
        <label>escolha a data da votação: </label>
        <input type="date" name="dtcomp"><br><br>  
        <input type="submit" class="button" value="Cadastrar">
        <br><br><br><br><br>
          <h3 style="font-weight: bold;"> A votação <span style="color:yellow;">ainda</span></h3>
          <h4>não foi iniciada</h4>
        </div>
      @elseif ($votUse)
        <div class="container">
          <br><br><br><br><br>
          <h3 style="font-weight: bold;">Seu voto foi <span style="color:yellow;">Confirmado</span></h3>
          <h4>Aguarde o resultado</h4>
        </div>
        
      @elseif ($candidato == null) <!-- Verifica se existe não existe candidatos -->
        <div class="container">
          <br><br><br><br><br>
          <h3 style="font-weight: bold;"> A votação <span style="color:yellow;">ainda</span></h3>
          <h4>não foi iniciada</h4>
        </div>
      @else
        <div class="container">
          <h3 style="font-weight: bold;">Selecione seu Candidato</h3>
          <h4> Digite o número do seu candidato e depois aperte em CONFIRMAR</h4>
          <br>
          <div class="col-md-4 ml-auto mr-auto">
            <div class="card card-login card-plain"> 
              <div>
                  <img class="card-img-top" src="{{ url('storage/candidatos/'.$candidato->CAN_IMAGEM) }}" alt="" id="logomain" id="imgcandidato" style="max-width: 150px;max-height: 150px;">
                  <h4 class="card-title" style="color:white; margin-bottom: 0em; margin-top: 0px; font-weight: bold;"> {{ $candidato->CAN_NOME }} Presidente</h4>
                  <h4  style="color:white; margin-bottom: 0em; margin-top: 0px;"> {{ $candidato->CAN_VICE }} Vice </h4>
                  <br>
                  
      
              </div>
              @if ($msg)
                <h6 style="color:yellow;">{{ $msg }} </h6>
              @endif
              <form class="form" method="get" action="{{ route('candidatos.votar') }}">
                  @csrf
                  <input class="form-control form-control-lg" type="text" name="filter" placeholder="Digite o número do seu candidato">
                  <button class="btn btn-primary btn-sm" type="submit">Buscar</button></div>
              </form>
              <form class="form" method="post" action="{{ route('votacao.create') }}">
                @csrf
                <input type="hidden" value="{{ $candidato->CAN_CODIGO }}" name="CAN_CODIGO">
                <button class="btn btn-primary btn-round btn-lg btn-block" type="submit" style="background-color:#1C7943 ;">Confirmar</button> 
              </form>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>

@endsection