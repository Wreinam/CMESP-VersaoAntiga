<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CMESP - Inscrição</title>

  <link href="../../../BootsTrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body class="bg-primary">
  <img src="../Imagem/CorredoresInscricao.jpg" class="img-fluid mx-auto d-block mb-3" alt="Pessoas correndo" width="500" height="200">
  <form class="container" id="formularioInscricao" method="POST" enctype="multipart/form-data">
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Dados do responsavel
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="form-check">
              <p class="fs-5 m-0 mt-2">Quer inscrever alguém?</p>
              <input class="form-check-input" type="radio" onchange="ocultarElemento('radioResponsavel1','divDadosResponsavel')" name="radioResponsavel" id="radioResponsavel1" checked>
              <label class="form-check-label" for="flexRadioDefault1">
                Sim
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" onchange="ocultarElemento('radioResponsavel1','divDadosResponsavel')" name="radioResponsavel" id="radioResponsavel2">
              <label class="form-check-label" for="flexRadioDefault2">
                Não
              </label>
            </div>
            <div class="mt-3" id="divDadosResponsavel">
              <select class="form-select mb-3" aria-label="Default select example" name="id_parentesco">
                <option selected value="0">Selecione seu grau de parentesco</option>
                <option value="1">Pai</option>
                <option value="2">Mae</option>
                <option value="3">Irmã ou Irmão</option>
                <option value="4">Tio ou Tia</option>
                <option value="5">Avo ou Vo</option>
              </select>
              <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="nome_responsavel" placeholder="Nome do Aluno" name="nome_responsavel">
                <label for="floatingInput">Nome do Responsavel</label>
              </div>
              <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="rg_responsavel" placeholder="Nome do Aluno" name="rg_responsavel">
                <label for="floatingInput">RG do Responsavel</label>
              </div>
              <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="cpf_responsavel" placeholder="Nome do Aluno" name="cpf_responsavel">
                <label for="floatingInput">CPF do Responsavel</label>
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text" for="rg_responsavel_frente">RG Responsavel - Frente</label>
                <input type="file" class="form-control" id="rg_responsavel_frente" name="imagem1">
              </div>
              <div class="input-group mb-3">
                <label class="input-group-text" for="rg_responsavel_verso">RG Responsavel - Verso</label>
                <input type="file" class="form-control" id="rg_responsavel_verso" name="imagem2">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            Informações pessoais do aluno
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="form-floating mb-3 ">
              <input type="text" class="form-control" id="nome_aluno" placeholder="Nome do Aluno" name="nome_aluno" required>
              <label for="floatingInput">Nome do Aluno</label>
            </div>
            <div class="form-floating mb-3 ">
              <input type="text" class="form-control" id="nome_mae" placeholder="Nome da Mãe" name="nome_mae" required>
              <label for="floatingInput">Nome da Mãe</label>
            </div>
            <div class="form-floating mb-3 ">
              <input type="text" class="form-control" id="nome_pai" placeholder="Nome do Pai" name="nome_pai">
              <label for="floatingInput">Nome do Pai</label>
            </div>
            <div class="form-floating mb-3 ">
              <input type="date" class="form-control" id="data_nascimento" placeholder="Data de Nascimento" name="data_nascimento" required>
              <label for="floatingInput">Data de Nascimento</label>
            </div>
            <div class="form-floating mb-3 ">
              <input type="number" class="form-control" id="idade" placeholder="Idade" name="idade" required>
              <label for="floatingInput">Idade</label>
            </div>
            <div class="form-floating mb-3 ">
              <input type="text" class="form-control" id="cpf_aluno" placeholder="CPF Do Aluno" name="cpf_aluno" required>
              <label for="floatingInput">CPF do Aluno</label>
            </div>
            <div class="form-floating mb-3 ">
              <input type="text" class="form-control" id="rg_aluno" placeholder="RG Do Aluno" name="rg_aluno" required>
              <label for="floatingInput">RG do Aluno</label>
            </div>
            <div class="input-group mb-3">
              <label class="input-group-text" for="arquivoRgFrente">RG do Aluno - Frente</label>
              <input type="file" class="form-control" id="arquivoRgFrente" name="imagem3" required>
            </div>
            <div class="input-group mb-3">
              <label class="input-group-text" for="arquivoRgVerso">RG do Aluno - Verso</label>
              <input type="file" class="form-control" id="arquivoRgVerso" name="imagem4" required>
            </div>
            <div class="form-floating mb-3 ">
              <input type="tel" class="form-control" id="telefone" placeholder="Telefone do aluno" name="telefone" required>
              <label for="floatingInput">Telefone celular com DDD</label>
            </div>
            <div class="form-floating mb-3 ">
              <input type="tel" class="form-control" id="telefone_emergencia" placeholder="Numero de emeregncia" name="telefone_emergencia" required>
              <label for="floatingInput">Telefone celular com DDD de emeregncia</label>
            </div>
            <div class="form-floating mb-3 ">
              <input type="email" class="form-control" id="email" placeholder="E-mail Aluno" name="email" required>
              <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating mb-3 ">
              <input type="text" class="form-control" id="nome_rua" placeholder="Nome Rua" name="nome_rua" required>
              <label for="floatingInput">Nome Rua e Nº</label>
            </div>
            <select class="form-select" aria-label="Default select example" id="selectBairro" name="bairro" required>
              <option selected value="0">Bairro onde mora</option>
              <option value="Pontal">Pontal</option>
              <option value="Maresias">Maresias</option>
              <option value="Olaria">Olaria</option>
            </select>
            <div class="form-check">
              <p class="fs-5 m-0 mt-2">Voçê estuda?</p>
              <input class="form-check-input" type="radio" onchange="ocultarElemento('radioEstuda1','divEstuda')" name="radioEstuda" id="radioEstuda1" checked>
              <label class="form-check-label" for="radioEstuda1">
                Sim
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" onchange="ocultarElemento('radioEstuda1','divEstuda')" name="radioEstuda" id="radioEstuda2">
              <label class="form-check-label" for="radioEstuda2">
                Não
              </label>
            </div>
            <div class="" id="divEstuda">
              <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="nome_escola" placeholder="Nome da Escola" name="nome_escola">
                <label for="floatingInput">Nome da escola</label>
              </div>
              <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="id_serie" name="id_serie">
                <label for="floatingInput">Série</label>
              </div>
              <select class="form-select mb-3" aria-label="Default select example" name="periodo">
                <option selected value="0">Qual o periodo?</option>
                <option value="Manha">Manhã</option>
                <option value="Tarde">Tarde</option>
                <option value="Noite">Noite</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTree" aria-expanded="false" aria-controls="collapseTree">
            Dados de Login
          </button>
        </h2>
        <div id="collapseTree" class="accordion-collapse collapse" aria-labelledby="headingTree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="container w-50">
              <input type="password" class="row align-self-center form-control mb-2" name="senha" placeholder="Senha" aria-label="Senha" aria-describedby="addon-wrapping" required>
              <input type="password" class="row align-self-center form-control mb-2" name="confirma_senha" placeholder="Confime a senha" aria-label="Confirme a Senha" aria-describedby="addon-wrapping" required>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto ">
              <button class="btn btn-primary" type="button" onclick="inserirInscricaoMunicipe()" id="botaoFormulario">Cadastrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Modal de CPF existente -->
  <div class="modal fade" id="existeCPFmodal" tabindex="-1" aria-labelledby="erroCPFmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="erroCPFmodalLabel">Cadastro com Erro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Erro no cadastro!<br>
                    CPF já esta em uso!<br>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para CPF invalido -->
  <div class="modal fade" id="invalidoCPFmodal" tabindex="-1" aria-labelledby="erroCPFmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="erroCPFmodalLabel">Cadastro com Erro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Erro no cadastro!<br>
                    CPF está invalido!<br>
                </div>
            </div>
        </div>
    </div>

  <script>
    function ocultarElemento(elementoChecar, elementoInvisivel) {
      var elementoInvi = document.getElementById(elementoInvisivel);
      if (document.getElementById(elementoChecar).checked) {
        elementoInvi.classList.remove("d-none");
      } else {
        elementoInvi.classList.add("d-none");
      }
    }
  </script>

  <!-- Script Geral do Sistema -->
  <script src="../../../BootsTrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../JavaScriptSistema/jquery.js"></script>
  <!-- Script para verificar se existe o CPF do municipe -->
  <script src="../Cadastro/Ajax/Inserir/inscricaoMunicipe.js" ></script>
  <script src="../Cadastro/Ajax/Listar/listarBairro.js" ></script>
</body>

</html>