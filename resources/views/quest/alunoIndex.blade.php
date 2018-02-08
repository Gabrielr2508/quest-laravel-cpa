@extends('layouts.index')

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js">



@section('conteudo')
  </br>
  </br>

  <div>
    <table class="table">
      <tbody>
        <tr>
          <td>Nome: {{$a->nome}}</td>
        </tr>
        <tr>
          <td>CPF: {{$a->cpf}}</td>
        </tr>
        <tr>
          <td>Curso: {{$a->curso}}</td>
        </tr>
      </tbody>
    </table>
  </div>

  @if(old('disciplina_id'))
    <div class="alert alert-success">
        <strong>Sucesso!</strong> A avaliação da disciplina {{old('disciplina_id')}} foi efetuada.
    </div>

  @endif


  </br>

  <div class="alert alert-warning" role="alert">
    <h4>Disciplinas Cursadas:</h4>
    </br></br>
    <table class="table table-striped table-bordered table-hover" id="table_disciplinas">
      <thead>
        <tr class="info">
          <th class="col-xs-1">Período</th>
          <th>Disciplina</th>
          <th>Professor</th>
          <th class="col-xs-1">Avaliar</th>
        </tr>
      </thead>
      <tbody>
        @forelse($alunoDisciplina as $d)
          <tr>
            <td>{{$d->disciplina->periodo}} </td>
            <td>{{$d->disciplina->nome}} </td>
            <td>{{$d->disciplina->professor->nome}} </td>

            @if(is_null(DB::table('quests')->where('disciplina_id', $d->disciplina->id)->where('professor_id', $d->disciplina->professor_id)->where('aluno_id', $a->id)->first()))
              <td class="text-center">
                <a href="/aluno/edita/{{$d->disciplina->id}}">
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
              </td>
            @else
              <td class="text-center">
                <a href="">
                  <span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span>
                </a>
              </td>
            @endif

          </tr>
        @empty
          <div class="alert alert-danger">
           Você não tem nenhuma disciplina cursadas.
          </div>
        @endforelse
      </tbody>
    </table>
  </div>

  </br>
  </br>



  <script>
  $(document).ready(function(){
    $('#table_disciplinas').DataTable({
      "pagingType": "numbers",
      "columnDefs": [{
        "targets": 3,
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
