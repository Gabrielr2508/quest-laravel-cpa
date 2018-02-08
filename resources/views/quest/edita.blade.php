@extends('layouts.index')

@section('addMenu')
  <li><a href="/">Início</a></li>
@endsection

@section('conteudo')
  <div>
    <h4>Detalhes da disciplina:</h4>
    <ul>
      <li>
        <b>Nome:</b> {{$d->nome}}
      </li>
      <li>
        <b>Período:</b> {{$d->periodo}}
      </li>
      <li>
        <b>Professor:</b> {{$d->professor->nome}}
      </li>
    </ul>
  </div>

  </br>

  <div class="alert alert-info" align="center">
    <h3>Questionário de Avaliação Docente pelo Discente</h3>
  </div>

  </br>
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

  <form action="/aluno/adiciona" method="post">

    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

    <input type="hidden" name="disciplina_id" value="{{$d->id}}"/>
    <input type="hidden" name="aluno_id" value="{{$a->id}}"/>
    <input type="hidden" name="professor_id" value="{{$d->professor_id}}"/>

    <div class="form-group">
      <div>
        <h4>AVALIAÇÃO DOCENTE:</h4>
      </div>
    </br>
      <label>1. Demonstrou segurança na exposição dos conteúdos, expondo-os com clareza e destacando aplicações e aspectos importantes da matéria.</label>
        <select class="form-control" name="quest1" value="{{ old('quest1') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
        </select>
    </div>
    <div class="form-group">
      <label>2. Desenvolveu as aulas com objetividade, utilizando recursos e procedimentos apropriados.</label>
      <select name="quest2" class="form-control" value="{{ old('quest2') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
      </select>
    </div>
    <div class="form-group">
      <label>3. Incentivou a participação dos alunos, analisando o seu questionamento crítico e suas contribuições.</label>
      <select name="quest3" class="form-control" value="{{ old('quest3') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
      </select>
    </div>
    <div class="form-group">
      <label>4. Mostrou-se disponível para atendê-los, sempre que possível.</label>
      <select name="quest4" class="form-control" value="{{ old('quest4') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>>
      </select>
    </div>
    <div class="form-group">
      <label>5. Buscou cumprir os procedimentos e critérios de avaliação, alterando-os somente quando devidamente justificado.</label>
      <select name="quest5" class="form-control" value="{{ old('quest5') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
      </select>
    </div>
    <div class="form-group">
      <label>6. Utilizou instrumentos de avaliação (avaliações, trabalhos práticos, exercícios ou outros) compatíveis com os conhecimentos, habilidades e atitudes desenvolvidas em sala de aula e/ou laboratório.</label>
      <select name="quest6" class="form-control" value="{{ old('quest6') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
      </select>
    </div>
    <div class="form-group">
      <label>7. Discutiu com os alunos os resultados das avaliações, esclarecendo as dúvidas.</label>
      <select name="quest7" class="form-control" value="{{ old('quest7') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
      </select>
    </div>
    <div class="form-group">
      <label>8. Pontualidade.</label>
      <select name="quest8" class="form-control" value="{{ old('quest8') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
      </select>
    </div>
    <div class="form-group">
      <label>9. Assiduidade (não falta as aulas com frequência, justificando com antecedência possíveis faltas).</label>
      <select name="quest9" class="form-control" value="{{ old('quest9') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
      </select>
    </div>
    <div class="form-group">
      <label>10. Apresentou aos alunos o PUD e o PD, logo nas primeiras aulas.</label>
      <select name="quest10" class="form-control" value="{{ old('quest10') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
      </select>
    </div>
    <div class="form-group">
      <label>11. Os conteúdos previstos para a disciplina foram desenvolvidos.</label>
      <select name="quest11" class="form-control" value="{{ old('quest11') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>>
      </select>
    </div>
    <div class="form-group">
      <label>12. A carga horária total da disciplina foi cumprida.</label>
      <select name="quest12" class="form-control" value="{{ old('quest12') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
      </select>
    </div>
    <div class="form-group">
      <label>13. Destacou a importância da disciplina para formação acadêmica e profissional.</label>
      <select name="quest13" class="form-control" value="{{ old('quest13') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
      </select>
    </div>
    <div class="form-group">
      <label>14. Aulas de reposição ministradas de acordo com a disponibilidade de toda a turma.</label>
      <select name="quest14" class="form-control" value="{{ old('quest14') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
      </select>
    </div>
    <div class="form-group">
      <label>15. A bibliografia recomendada condiz com a ementa da disciplina.</label>
      <select name="quest15" class="form-control" value="{{ old('quest15') }}">
          <option value="1">Péssimo</option>
          <option value="2">Ruim</option>
          <option value="3">Regular</option>
          <option value="4">Bom</option>
          <option value="5">Excelente</option>
          <option value="S">Não sei</option>
          <option value="A">Não se aplica</option>>
      </select>
    </div>
    <div class="form-group">
      <label>16. Críticas: <small>(Facultativo)</small></label>
      <textarea class="form-control" rows="5" name="criticas" value="{{ old('criticas') }}"></textarea>
    </div>
    <div class="form-group">
      <label>17. Sugestões: <small>(Facultativo)</small></label>
      <textarea class="form-control" rows="5" name="sugestoes" value="{{ old('sugestoes') }}"></textarea>
    </div>

    </br>
    <div>
      <h4>AUTOAVALIAÇÃO<h4>
    </div>
    </br>
    <div class="form-group">
      <label>1. Dediquei à disciplina todo esforço e energia de que sou capaz. <small>(Atribuir nota de 1 à 5)</small></label>
      <select name="auto_avaliacao" class="form-control" value="{{ old('auto_avaliacao') }}">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
      </select>
    </div>

    <button class="btn btn-info btn-lg btn-block" type="submit">Avaliar</button>
  </form>

@endsection
