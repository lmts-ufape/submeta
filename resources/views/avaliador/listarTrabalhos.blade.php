@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 100px;">

  <div class="container" >
    <div class="row" >
      <div class="col-sm-10">
        <h3>Trabalhos do Edital: {{ $evento->nome }}</h3>
      </div>
    </div>
  </div>
  <hr>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Nome do Projeto</th>
        <th scope="col">Data de Criação</th>
        <th scope="col">Projeto</th>
        <th scope="col">Plano de Trabalho</th>
        <th scope="col">Parecer</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($trabalhos as $trabalho)
        <tr>
          <td>{{ $trabalho->titulo }}</td>
          <td>{{ $trabalho->created_at }}</td>
          <td>
            {{--  --}}
            <a href="{{route('download', ['file' => $trabalho->anexoProjeto])}}" target="_new" style="font-size: 20px; color: #114048ff;" >
                <img class="" src="{{asset('img/icons/file-download-solid.svg')}}" style="width:20px">
            </a>
          </td>
          <td>
            @foreach( $trabalho->participantes as $participante)
              @php
                if( App\Arquivo::where('participanteId', $participante->pivot->participante_id)->first() != null){
                  $planoTrabalho = App\Arquivo::where('participanteId', $participante->pivot->participante_id)->first()->nome;
                }else{
                  $planoTrabalho = null;
                }
              @endphp
              @if ($planoTrabalho != null)
                <a href="{{route('download', ['file' => $planoTrabalho])}}" target="_new" style="font-size: 20px; color: #114048ff;" >
                  <img class="" src="{{asset('img/icons/file-download-solid.svg')}}" style="width:20px">
                </a>
              @else
                Não há planos de trabalho.
              @endif
            @endforeach
          </td>
          <td>
            <div class="row">
              <form action="{{ route('avaliador.parecer', ['evento' => $evento]) }}" method="POST">
                @csrf
                <input type="hidden" name="trabalho_id" value="{{ $trabalho->id }}" >
                <button type="submit" class="btn btn-primary mr-2 ml-2" >
                  Parecer
                </button>

              </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

@section('javascript')
<script>

</script>
@endsection
