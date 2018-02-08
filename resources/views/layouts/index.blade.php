<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="/css/custom.css" rel="stylesheet">
    <title>Sistema de Avaliação Docente</title>
  </head>
  <body>
    <div class="container">

    <nav class="navbar navbar-default">
      <div class="container-fluid">

      <div class="navbar-header">
        <a class="navbar-brand" href="/">
          <img alt="Brand" src="/img/logo.png">
        </a>
      </div>

      <p class="navbar-text">Sistema de Avaliação Docente</p>

        <ul class="nav navbar-nav navbar-right">
          @yield('addMenu')
          <li>
              <a href="/logout">Sair&nbsp
                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
              </a>
          </li>
        </ul>

      </div>
    </nav>

      @yield('conteudo')

      @yield('coordenador')

    <footer class="footer">
        <p></p>
    </footer>

    </div>
  </body>
  </html>
