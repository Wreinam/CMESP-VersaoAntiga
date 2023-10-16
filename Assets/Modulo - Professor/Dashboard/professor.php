<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Porfessor - Home</title>
  <link rel="shortcut icon" href="images/peixelogo.svg" type="image/x-icon">

  <link href="../../../BootsTrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../CssSistema/professor.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


  <!-- Custom styles for this template -->
  <style>
    .gradientnavbar {
      background: linear-gradient(90deg, #E6CD33 0%, #FCE451 37.54%, #F6E477 73.54%)
    }

    .nav-pills .nav-link.active {
      background-color: #EDCD06;
    }
  </style>
</head>

<body class="vh-100">
  <header class="navbar sticky-top flex-md-nowrap shadow pe-2 pt-0 pb-0 gradientnavbar">
    <div class="col-3 col-md-3 col-lg-2 shadow p-2 d-flex justify-content-center align-items-center" style="background-color: #FCE451;">
      <div class="text-nowrap pt-2">
        <p class="text-white">Professor</p>
      </div>
    </div>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="top: 1rem !important;">
        <div class="position-sticky sidebar-sticky">
          <nav class="nav nav-pills m-3 flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <li class="nav-item " role="presentation">
              <button class="nav-link w-100 text-start active" id="chamada-tab" data-bs-toggle="tab" data-bs-target="#chamada" type="button"><i class="bi bi-folder-check" style="margin-right: 10px;"></i>
                Chamada</button>
            </li>
            <li class="nav-item">
              <button class="nav-link w-100 text-start" onclick="deslogar()" id="deslogar-tab" type="button"><i class="bi bi-box-arrow-in-right" style="margin-right: 10px;"></i>
                Deslogar</button>
            </li>
          </nav>
        </div>
      </nav>

      <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4" id="v-pills-tabContent">
        <div class="tab-content" style="background-color: white; color:black !important;">
          <div class="tab-pane fade show active text-center" id="chamada" role="tabpanel" aria-labelledby="chamada-tab" tabindex="0">
          <p class="fs-3" id="dataHojeChamada"></p>
          <div class="d-flex flex-wrap justify-content-evenly" id="chamadaTurma">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para Edição de dados-->
  <div class="modal fade" id="modalChamadaLista" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalChamadaListaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalChamadaListaLabel">Edição de
            dados</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form id="formularioChamada">
            <div class="overflow-auto">
              <table class="table table-hover table-striped">
                <thead class="table-dark">
                  <tr>
                    <th class="col-1">#</th>
                    <th class="col-5">Nome</th>
                    <th class="col-3">Presença</th>
                    <th class="col-3">Anamnese</th>
                  </tr>
                </thead>
                <tbody id="tabelaAlunosChamada">

                </tbody>
              </table>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" onclick="efetuarChamada()" data-bs-dismiss="modal" class="btn btn-primary">Efetuar Chamada</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para Exclusão-->
  <div class="modal fade" id="modalExcluir" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalExcluirModalidadeLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalExcluirLabel">Exclusão
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Deseja realmente exlcuir?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Excluir</button>
        </div>
      </div>
    </div>
  </div>




  <!-- Modal de exclusão não executada -->
  <div class="modal fade" id="modalNaoExecutada" tabindex="-1" aria-labelledby="modalNaoExecutadaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalNaoExecutadaLabel">Exclusão não executada!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Não podemos excluir pois está em uso!<br>
          Exclua os itens que o usam!<br>
        </div>
      </div>
    </div>
  </div>


  <!-- Notificação de sucesso -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="notificaoSucesso" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <span style=" border-radius: 5px;width: 20px; height: 20px; background-color: rgb(8, 203, 8); margin-right: 5px;"></span>
        <strong class="me-auto">Notificação</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Sucesso na ação!
      </div>
    </div>
  </div>
  <!-- Notificação de Erro -->
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="notificaoErro" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <span style=" border-radius: 5px;width: 20px; height: 20px; background-color: red; margin-right: 5px;"></span>
        <strong class="me-auto">Notificação</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Erro na ação!
      </div>
    </div>
  </div>

  <!-- Script Geral do Sistema -->
  <script src="../../../JavaScriptSistema/jquery.js"></script>
  <script src="../../../BootsTrap/js/bootstrap.bundle.min.js"></script>

  <!-- Carrega as turmas que ele da aula -->
  <script src="../Chamada/Ajax/Listar/listarTurmaPorProfessor.js"></script>
  <script src="../Chamada/Ajax/Listar/listarAlunosChamada.js"></script>

  <!-- Serve para cancelar a chamada -->
  <script src="../Chamada/Ajax/Inserir/cancelarChamada.js"></script>
  <!--Serve para efetuar a chamada -->
  <script src="../Chamada/Ajax/Inserir/efetuarChamada.js"></script>

  <!-- Script para deslogar -->
  <script src="../Deslogar/Ajax/deslogar.js"></script>

</body>

</html>