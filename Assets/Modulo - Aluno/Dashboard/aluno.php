<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aluno</title>
  <link rel="shortcut icon" href="images/peixelogo.svg" type="image/x-icon">

  <link href="../../../BootsTrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../CssSistema/aluno.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

  <!-- Custom styles for this template -->
  <style>
    .gradientnavbar {
      background: linear-gradient(90deg, #05B54B 0%, rgba(1, 204, 70, 0.85) 37.54%, #5DDE40 73.54%);

    }

    .nav-pills .nav-link.active {
      background-color: #5DDE40;
    }
  </style>
</head>

<body class="vh-100">
  <header class="navbar sticky-top flex-md-nowrap shadow pe-2 pt-0 pb-0 gradientnavbar">
    <div class="col-3 col-md-3 col-lg-2 shadow p-2 d-flex justify-content-center align-items-center" style="background-color: #11B151;">
      <div class="text-nowrap pt-2">
        <p class="text-white">Aluno</p>
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
            <li class="nav-item" role="presentation">
              <button class="nav-link w-100 text-start" id="matriculas-tab" data-bs-toggle="tab" data-bs-target="#matriculas" type="button" disabled><i class="bi bi-journal-bookmark-fill" style="margin-right: 10px;"></i>
                Matriculas</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link w-100 text-start" id="cadastroturma-tab" data-bs-toggle="tab" data-bs-target="#cadastroturma" type="button" disabled><i class="bi bi-file-earmark-plus" style="margin-right: 10px;"></i>
                Inscrever-se</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link w-100 text-start" id="lista-espera-tab" data-bs-toggle="tab" data-bs-target="#listaEspera" type="button" disabled><i class="bi bi-file-earmark-plus" style="margin-right: 10px;"></i>
                Lista de Espera</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link w-100 text-start active" id="anamnese-tab" data-bs-toggle="tab" data-bs-target="#anamnese" type="button"><i class="bi bi-clipboard-heart" style="margin-right: 10px;"></i>
                Salvar Anamnese
              </button>
            </li>
            <li class="nav-item">
              <button class="nav-link w-100 text-start" onclick="deslogar()" id="configuracoes-tab" type="button"><i class="bi bi-box-arrow-in-right" style="margin-right: 10px;"></i>
                Deslogar</button>
            </li>
          </nav>
        </div>
      </nav>

      <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4" id="v-pills-tabContent">
        <div class="tab-content" style="background-color: white; color:black !important;">
          <div class="tab-pane fade" id="matriculas" role="tabpanel">
            <p class="fs-3 text-center">Matriculas</p>
            <div class="d-flex justify-content-evenly flex-wrap" id="matriculas_div">
              <!-- Aqui é inserido as matriculas de forma automatica pelo servidor -->
            </div>
          </div>
          <div class="tab-pane fade" id="cadastroturma" role="tabpanel">
            <div class="pt-3 p-5 mb-3">
              <p class="fs-3 text-center">Inscreva-se em uma turma</p>
              <form>
                <h4>Modalidade</h4>
                <select class="form-select mb-3" onchange="listarBairroSelect(this.value)" id="select_id_modalidade">
                  <option selected>Modalidade</option>
                </select>
                <h4>Bairro</h4>
                <select class="form-select mb-3" onchange="listarTurmaSelect(this.value, select_id_modalidade.value)" id="select_nome_bairro">
                  <option selected>Bairro</option>
                </select>
                <h4>Turma</h4>
                <select class="form-select mb-3" aria-label="Default select example" id="select_lista_turma">
                  <option selected>Turma</option>
                </select>
                <input type='button' onclick='cadastroMatricula(select_lista_turma.value)' class='btn btn-primary mt-3 w-25' value='Inscrever-se' />
              </form>
              <!-- Essa notificação sobe para indicar que ele foi para uma lista de espera -->
              <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="notificaoEspera" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="toast-header">
                    <span style=" border-radius: 5px;width: 20px; height: 20px; background-color: red; margin-right: 5px;"></span>
                    <strong class="me-auto">Notificação</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">
                    Voçê foi para a lista de espera!
                  </div>
                </div>
              </div>
              <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="notificaoMatriculado" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="toast-header">
                    <span style=" border-radius: 5px;width: 20px; height: 20px; background-color: red; margin-right: 5px;"></span>
                    <strong class="me-auto">Notificação</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">
                    Voçê já está matriculado ou em uma lista de espera nessa turma!
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="listaEspera" role="tabpanel">
            <p class="fs-3 text-center">Lista de espera</p>
            <div class="d-flex justify-content-evenly flex-wrap" id="listaEspera_div">
              <!-- Aqui é inserido aposições na lista de espera de forma automatica pelo servidor -->
            </div>
          </div>
          <div class="tab-pane fade show active" id="anamnese" role="tabpanel">
            <p class="fs-3 text-center">Anamnese</p>
            <form id="anamneseFormulario">
              <div>
                <div class="form-check">
                  <p class="fs-5 m-0 mt-2">Tem algum problema cardíaco?</p>
                  <input class="form-check-input" type="radio" name="radio_cardiaco" id="radioCardiaco1" value="on" onchange="ocultarElemento('radioCardiaco1','inputCardiaco')" checked>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Sim
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radio_cardiaco" id="radioCardiaco2" value="off" onchange="ocultarElemento('radioCardiaco1','inputCardiaco')">
                  <label class="form-check-label" for="flexRadioDefault2">
                    Não
                  </label>
                </div>
                <div class="form-floating mb-3 mt-3" id="inputCardiaco">
                  <input type="text" class="form-control" id="obs_cardiaco" placeholder="Qual o problema" name="problemaCardiaco">
                  <label for="floatingInput">Qual o problema?</label>
                </div>
              </div>

              <p class="fs-6">Termo de consentimento livre e esclarecido.
                <br>
                ASSUMO TOTAL RESPONSABILIDADE SOBRE AS MINHAS CONDIÇÕES FÍSICAS DE SAÚDE OU DO(A) MENOR QUE ESTOU
                RESPONSÁVEL NESTA FICHA, PARA A PRÁTICA DA MODALIDADE ACIMA ESCOLHIDA. AUTORIZO O (A) PROFESSOR (A) A
                PRESCREVER AS ATIVIDADES FÍSICAS PERTINENTES À AULA MINISTRADA E ESTOU CIENTE DOS RISCOS QUE ENVOLVEM A
                PRÁTICA ESPORTIVA.

                OBS: O ALUNO OU RESPONSÁVEL FOI INFORMADO DE QUE PRECISA ENTREGAR O ATESTADO MÉDICO PARA O PROFESSOR
                PARA INICIAR SUA AULA.

                TERMO DE AUTORIZAÇÃO
                AUTORIZO O ENVIO DE INFORMAÇÕES ATUALIZADAS DA PREFEITURA NOS TELEFONES, EMAIL E PÁGINAS DAS REDES
                SOCIAIS, ASSIM COMO O USO DE MINHA IMAGEM EM FOTOS OU FILME, SEM FINALIDADE COMERCIAL. A PRESENTE
                AUTORIZAÇÃO É CONCEDIDA A TÍTULO GRATUITO, ABRANGENDO O USO DA IMAGEM ACIMA MENCIONADA EM TODO
                TERRITÓRIO NACIONAL E NO EXTERIOR. AUTORIZO TAMBÉM CONTATO DA PREFEITURA DE SÃO SEBASTIÃO SOBRE PESQUISA
                DE SATISFAÇÃO, E TAMBÉM O CONTATO DA SECRETARIA DE ESPORTES - SEESP E DOS PROFESSORES SOBRE AS AULAS E
                ASSUNTOS PERTINENTES.
              </p>
              <div class="form-check">
                <p class="fs-5">Aceita os termos?</p>
                <input class="form-check-input" type="checkbox" name="checkboxTermo" id="checkboxTermo" required>
                <label class="form-check-label" for="checkboxTermo">
                  Sim
                </label>
                <div id="botao_div">
                  <!-- Div onde fica os botões da anamnese -->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

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

  <script>
    function ocultarElemento(elementoChecar, elementoInvisivel, elementoEsvaziar) {
      var elementoInvi = document.getElementById(elementoInvisivel);
      if (document.getElementById(elementoChecar).checked) {
        elementoInvi.classList.remove("d-none");
      } else {
        elementoInvi.classList.add("d-none");
      }
    }
  </script>

  <!-- Script Geral do Sistema -->
  <script src="../../../JavaScriptSistema/jquery.js"></script>
  <script src="../../../BootsTrap/js/bootstrap.bundle.min.js"></script>
  <!-- Responsavel por fazer toda a parte da anamnese -->
  <script src="../Anamnese/Ajax/Inserir/inserirAnamnese.js"></script>
  <script src="../Anamnese/Ajax/Listar/listarAnamnese.js"></script>
  <script src="../Anamnese/Ajax/Atualizar/atualizarAnamnese.js"></script>
  <!-- Responsavel por fazer a atualização dos selects do sub-modulo Inscrever-se -->
  <script src="../Inscrever-se/Ajax/listar/listarModalidade.js"></script>
  <script src="../Inscrever-se/Ajax/listar/listarBairroPorModalidade.js"></script>
  <script src="../Inscrever-se/Ajax/listar/listarTurmaPorBairro.js"></script>
  <!-- Responsavel por toda a parte da matricula -->
  <script src="../Matricula/Ajax/Inserir/inserirMatricula.js"></script>
  <script src="../Matricula/Ajax/Listar/listarMatricula.js"></script>
  <script src="../Matricula/Ajax/Excluir/excluirMatricula.js"></script>
  <!-- Responsavel por mostrar a lista de espera -->
  <script src="../Lista Espera/Ajax/Listar/listarListaEspera.js"></script>
  <!-- Script para deslogar -->
  <script src="../Deslogar/Ajax/deslogar.js"></script>
</body>

</html>