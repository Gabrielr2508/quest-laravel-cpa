@extends('layouts.index')

@section('addMenu')
  <li><a href="/">Início</a></li>
@endsection

@section('conteudo')
  <div>
    <h3 align="center">{{$d->nome}}</h3>
    <ul>
      <li>
        <b>Período:</b> {{$d->periodo}}
      </li>
      <li>
        <b>Professor:</b> {{$d->professor->nome}}
      </li>
      <li>
        <b>CPF:</b> {{$d->professor->cpf}}
      </li>
      <li>
        <b>Quantidade de Alunos Matriculados:</b> {{DB::table('alunoDisciplina')->where('disciplina_id', $d->id)->count()}}
      </li>
      <li>
        <b>Quantidade de Questionários Respondidos:</b> {{DB::table('quests')->where('disciplina_id', $d->id)->count()}}
      </li>
      <li>
        <b>Representatividade:</b> {{number_format(((DB::table('quests')->where('disciplina_id', $d->id)->count())/(DB::table('alunoDisciplina')->where('disciplina_id', $d->id)->count()))*100, 2)}} %
      </li>
    </ul>
  </div>

  </br>

  <div class="alert alert-warning"> 
    <h4>Peso de cada resposta:</h4>
    <ul>
      <li>Não sei: 0</li>
      <li>Não se aplica: 0</li>
      <li>Péssimo: 1</li>
      <li>Ruim: 2</li>
      <li>Regular: 3</li>
      <li>Bom: 4</li>
      <li>Excelente: 5</li>
    </ul>

    </br>
    
    <p><small>Obs.: As respostas "Não sei" e "Não se aplica" não são levadas em consideração para o cálculo das estatísticas.</small></p>
  </div>

  <a class="btn btn-info pull-right" href="/download/{{$d->id}}" role="button">Download</a>

  </br>

  </br>

  <table class="table table-striped table-bordered table-hover">
  <tr>
    <th rowspan="2" class="text-center col-xs-3 info">Questões</th>
    <th colspan="7" class="text-center info">Respostas <small>(Quantidade)</small></th>
    <th colspan="5" class="text-center info">Estatística</th>
  </tr>
  <tr>
    <td class="text-center warning"><small>Não sei</small></td>
    <td class="text-center warning"><small>Não se aplica</small></td>
    <td class="text-center warning"><small>Péssimo</small></td>
    <td class="text-center warning"><small>Ruim</small></td>
    <td class="text-center warning"><small>Regular</small></td>
    <td class="text-center warning"><small>Bom</small></td>
    <td class="text-center warning"><small>Excelente</small></td>
    <td class="text-center warning"><small>Total</small></td>
    <td class="text-center warning"><small>Média</small></td>
    <td class="text-center warning"><small>Mediana</small></td>
    <td class="text-center warning"><small>Moda</small></td>
    <td class="text-center warning"><small>Coeficiente de variação</small></td>
  </tr>
  <tr>
    <td class="text-justify">1. Demonstrou segurança na exposição dos conteúdos, expondo-os com clareza e destacando aplicações e aspectos importantes da matéria.</td>
    <td>{{DB::table('quests')->where('disciplina_id', $d->id)->where('quest1', 'S')->count()}}</td>
    <td>{{DB::table('quests')->where('disciplina_id', $d->id)->where('quest1', 'A')->count()}}</td>
    <td>{{DB::table('quests')->where('disciplina_id', $d->id)->where('quest1', '1')->count()}}</td>
    <td>{{DB::table('quests')->where('disciplina_id', $d->id)->where('quest1', '2')->count()}}</td>
    <td>{{DB::table('quests')->where('disciplina_id', $d->id)->where('quest1', '3')->count()}}</td>
    <td>{{DB::table('quests')->where('disciplina_id', $d->id)->where('quest1', '4')->count()}}</td>
    <td>{{DB::table('quests')->where('disciplina_id', $d->id)->where('quest1', '5')->count()}}</td>
    <td>{{DB::table('quests')->where('disciplina_id', $d->id)->where('quest1', '<>', 'S')->where('quest1', '<>', 'A')->count()}}</td>
    <td>{{DB::table('quests')->where('disciplina_id', $d->id)->where('quest1', '<>', 'S')->where('quest1', '<>', 'A')->avg('quest1')}}</td>
    <td></td>
    <td>{{DB::statement('SELECT quest1, COUNT( * ) FROM quests GROUP BY quest1 ORDER BY COUNT( * ) DESC LIMIT 1')}}</td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">2. Desenvolveu as aulas com objetividade, utilizando recursos e procedimentos apropriados.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">3. Incentivou a participação dos alunos, analisando o seu questionamento crítico e suas contribuições.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">4. Mostrou-se disponível para atendê-los, sempre que possível.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">5. Buscou cumprir os procedimentos e critérios de avaliação, alterando-os somente quando devidamente justificado.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">6. Utilizou instrumentos de avaliação (avaliações, trabalhos práticos, exercícios ou outros) compatíveis com os conhecimentos, habilidades e atitudes desenvolvidas em sala de aula e/ou laboratório.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">7. Discutiu com os alunos os resultados das avaliações, esclarecendo as dúvidas.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">8. Pontualidade.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">9. Assiduidade (não falta as aulas com frequência, justificando com antecedência possíveis faltas).</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">10. Apresentou aos alunos o PUD e o PD, logo nas primeiras aulas.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">11. Os conteúdos previstos para a disciplina foram desenvolvidos.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">12. A carga horária total da disciplina foi cumprida.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">13. Destacou a importância da disciplina para formação acadêmica e profissional.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">14. Aulas de reposição ministradas de acordo com a disponibilidade de toda a turma.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td class="text-justify">15. A bibliografia recomendada condiz com a ementa da disciplina</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="13">Críticas</td>
  </tr>
  <tr>
    <td colspan="13">
      <ul>
        @forelse($criticas as $c)
          <li>{{$c->criticas}}</li>
        @empty
          <div class="alert alert-success">
            Não há críticas.
          </div>
        @endforelse  
      </ul>
    </td>
  </tr>
  <tr>
    <td colspan="13">Sugestões</td>
  </tr>
  <tr>
    <td colspan="13">
      <ul>
        @forelse($sugestoes as $s)
          <li>{{$s->sugestão}}</li>
        @empty
          <div class="alert alert-warning">
            Não há sugestões.
          </div>
        @endforelse  
      </ul>
    </td>
  </tr>
</table>


@endsection
