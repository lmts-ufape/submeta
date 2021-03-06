@extends('layouts.app')

@section('content')
<div class="container content">

    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card" style="margin-top:50px">
                <div class="card-body">
                  <h5 class="card-title">Meu Parecer</h5>
                  <h6 class="card-title">Trabalho: {{ $trabalho->titulo }}</h6>
                  <p class="card-text">
                    <form method="POST" action="{{route('avaliador.enviarParecer')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="trabalho_id" value="{{ $trabalho->id }}" >
                        <input type="hidden" name="evento_id" value="{{ $evento->id }}" >
												<div class="form-group">
											    <label for="exampleFormControlTextarea1">Parecer:</label>
											    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="textParecer">{{ $trabalho->pivot->parecer }}</textarea>
											  </div>
											  <select class="custom-select" name="recomendacao" >
											  	@foreach($recomendacaos as $recomendacao)
											  		@if($trabalho->pivot->recomendacao == $recomendacao->nome)
											  			<option selected value="{{ $recomendacao->nome  }}" >{{ $recomendacao->nome }}</option>
														@else
															<option value="{{ $recomendacao->nome }}">{{ $recomendacao->nome }}</option>
											  		@endif													  
												  @endforeach												  
												</select>
											  <div class="form-group  mt-3 md-3">
											  	@if($trabalho->pivot->AnexoParecer == null)
														<label for="exampleFormControlFile1">Anexo do Parecer:</label>
											    	<input type="file" class="form-control-file" id="exampleFormControlFile1" name="anexoParecer">

											  	@else
													<label for="exampleFormControlFile1">Já existe um arquivo, quer atualizar?</label>
													<br> <label for="exampleFormControlFile1"> Arquivo atual:</label> 
																<a href="{{route('download', ['file' => $trabalho->pivot->AnexoParecer])}}" target="_new" style="font-size: 20px; color: #114048ff;" >
										                <img class="" src="{{asset('img/icons/file-download-solid.svg')}}" style="width:20px">
										            </a><br>
																							
											    	<input type="file" class="form-control-file" id="exampleFormControlFile1" name="anexoParecer">
											  	@endif
											    
											  </div>
												<button type="submit" class="btn btn-primary">Enviar</button>
												<a href="{{ route('avaliador.visualizarTrabalho', ['evento_id' => $evento->id])}}"  class="btn btn-danger" >Cancelar</a>
                    </form>

                </div>
              </div>
        </div>
    </div>

</div>
@endsection

@section('javascript')
<script type="text/javascript">


</script>
@endsection
