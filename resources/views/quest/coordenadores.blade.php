@extends('layouts.index')

@section('addMenu')
  <li><a href="/">Início</a></li>
@endsection

@section('conteudo')

	<h3 align="center">Definição dos Coordenadores dos Cursos</h3>

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	      <ul>
	        @foreach($errors->all() as $error)
	          <li>
	            {{$error}}
	          </li>
	        @endforeach
	      <ul>
	    </div>
	@endif

	@if(old('coordenador_id'))
	    <div class="alert alert-success">
	        <strong>Sucesso!</strong> O coordenador do colegiado {{old('colegiado_id')}} foi atualizado.
	    </div>
	@endif

	@forelse($colegiados as $c)
		<div class="alert alert-warning">
			<form action="/coordenadores/atualiza" method="post">

			  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
			  <input type="hidden" name="colegiado_id" value="{{$c->id}}"/>

			  <div class="form-group">
			    <label><h3>{{$c->nome}}<h3></label>
			    <h5>Coordenador atual: {{DB::table('professores')->where('id', $c->coordenador_id)->value('nome')}}</h5>
			    <select class="form-control" name="coordenador_id" value="{{ $c->coordenador_id }}">
				  	@forelse($professores as $p)				   
				    		<option value="{{ $p->id }}">{{$p->nome}}</option>	
				    @empty
				    	<div class="alert alert-danger">
		   					Não há professores.
		  				</div>
		  			@endforelse 
				</select>

			  </div>
		  	  <button class="btn btn-info" type="submit">Enviar</button>	
		  	</form>
			</br>
		</div>		
	@empty
  		<div class="alert alert-danger">
   			Não há colegiados.
  		</div> 		  
	@endforelse  
	


@endsection