@extends('layouts.index')

@section('addMenu')
  <li><a href="/">Início</a></li>
@endsection

@section('conteudo')

 
	<div align="center">
		<h3>Upload de novo arquivo .csv</h3>
	</div>
	</br>	
	<div class="alert alert-info">
		<form action="{{ URL::to('importExcel') }}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		  	<div class="form-group">
		  	  <input type="file" name="csv_import"/>
		  	</div>  
		  	<button class="btn btn-primary">Importar</button>
		</form>
	</div>



@endsection