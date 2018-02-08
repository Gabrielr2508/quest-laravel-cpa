@extends('layouts.index')

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js">



@section('conteudo')
</br></br>

<div>
  <table class="table">
    <tbody>
      <tr>
        <td>Nome: {{$p->nome}}</td>
      </tr>
      <tr>
        <td>CPF: {{$p->cpf}}</td>
      </tr>
    </tbody>
  </table>
</div>

</br>
<div class="alert alert-warning" role="alert">
  <h4>Disciplinas Ministradas:</h4>
  </br></br>
  <table class="table table-striped table-bordered table-hover" id="table_disciplinas">
    <thead>
      <tr class="info">
        <th class="col-xs-1">Período</th>
        <th>Nome</td>
        <th class="col-xs-1">Visualizar</th>
      </tr>
    </thead>
    <tbody>
      @forelse($disciplinas as $disciplina)
        <tr>
          <td>{{$disciplina->periodo}} </td>
          <td>{{$disciplina->nome}} </td>
          <td class="text-center">
            <a href="/professor/visualiza/{{$disciplina->id}}">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </a>
          </td>
        </tr>
      @empty
        <div class="alert alert-danger">
         Você não ministrou nenhuma disciplina.
        </div>
      @endforelse
    </tbody>
  </table>
</div>
</br></br>



<script>
$(document).ready(function(){
  $('#table_disciplinas').DataTable({
    "pagingType": "numbers",
    "columnDefs": [{
      "targets": 2,
      "orderable": false
    }],
    "language": {
          "lengthMenu": "Mostrando _MENU_ registros por página",
          "zeroRecords": "Nada encontrado",
          "info": "Página _PAGE_ de _PAGES_",
          "infoEmpty": "Nenhum registro disponível",
          "infoFiltered": "(filtrado de _MAX_ registros no total)"

      }
  });
});
</script>

@endsection


@if(Gate::allows('is_coordenador'))
  @section('coordenador')
    </br></br>

    </br>
    <div class="alert alert-warning" role="alert">
      <h4>Disciplinas ministradas pelos professores do colegiado: {{DB::table('colegiados')->where('coordenador_id', $p->id)->value('nome')}}</h4>
      </br></br>
      <table class="table table-striped table-bordered table-hover" id="table_disciplinas_colegiado">
        <thead>
          <tr class="info">
            <th class="col-xs-1">Período</th>
            <th>Nome</td>
            <th>Professor</td>
            <th class="col-xs-1">Visualizar</th>
          </tr>
        </thead>
        <tbody>
          @forelse($disciplinasColegiado as $dc)
            <tr>
              <td>{{$dc->periodo}} </td>
              <td>{{$dc->nome}} </td>
              <td>{{$dc->professor->nome}} </td>
              <td class="text-center">
                <a href="/professor/visualiza/{{$dc->id}}">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </a>
              </td>
            </tr>
          @empty
            <div class="alert alert-danger">
             O colegiado não possui disciplinas ministradas.
            </div>
          @endforelse
        </tbody>
      </table>
    </div>
    </br></br>



    <script>
    $(document).ready(function(){
      $('#table_disciplinas_colegiado').DataTable({
        "pagingType": "numbers",
        "columnDefs": [{
          "targets": 2,
          "orderable": false
        }],
        "language": {
              "lengthMenu": "Mostrando _MENU_ registros por página",
              "zeroRecords": "Nada encontrado",
              "info": "Página _PAGE_ de _PAGES_",
              "infoEmpty": "Nenhum registro disponível",
              "infoFiltered": "(filtrado de _MAX_ registros no total)"

          }
      });
    });
    </script>
  @endsection
@endif  