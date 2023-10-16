<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestor - Home</title>
    <link rel="shortcut icon" href="images/peixelogo.svg" type="image/x-icon">

    <link href="../../../BootsTrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../CssSistema/gestor.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <style>
        .gradientnavbar {
            background: linear-gradient(90deg, #3296D8 0%, #3BA5EC 37.54%, #40AFF9 73.54%);
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)
        }
    </style>

</head>

<body class="vh-100">
    <header class="navbar sticky-top flex-md-nowrap shadow pe-2 pt-0 pb-0 gradientnavbar">
        <div class="col-3 col-md-3 col-lg-2 shadow p-2 d-flex justify-content-center align-items-center" style="background-color: #3171AC;">
            <div class="text-nowrap pt-2">
                <p class="text-white">Admin</p>
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
                        <div class="accordion" id="accordionCadastrar">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="bi bi-file-earmark-plus" style="margin-right: 10px;"></i>
                                        Cadastrar
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start active" id="cadastrar-tab" data-bs-toggle="tab" data-bs-target="#cadastrar" type="button">
                                                Modalidade</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start" id="professor-tab" data-bs-toggle="tab" data-bs-target="#professor" type="button">
                                                Professor</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start" id="endereco-tab" data-bs-toggle="tab" data-bs-target="#endereco" type="button">
                                                Endereço</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link w-100 text-start" id="endereco-tab" data-bs-toggle="tab" data-bs-target="#turma" type="button">
                                                Turma</button>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link w-100 text-start" onclick="" id="dadosalunos-tab" data-bs-toggle="tab" data-bs-target="#dadosalunos" type="button"><i class="bi bi-folder-check" style="margin-right: 10px;"></i>
                                Alunos Matriculados</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link w-100 text-start" onclick="window.location.href='deslogar'" id="configuracoes-tab" type="button"><i class="bi bi-box-arrow-in-right" style="margin-right: 10px;"></i>
                                Deslogar</button>
                        </li>
                    </nav>
                </div>
            </nav>

            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4" id="v-pills-tabContent">
                <div class="tab-content" style="background-color: white; color:black !important;">
                    <div class="tab-pane fade show active" id="cadastrar" role="tabpanel" aria-labelledby="cadastrar-tab" tabindex="0">
                        <div class="d-flex flex-column align-items-center">
                            <p class="fs-3">Cadastro de Modalidade</p>
                            <form class="w-50 d-flex flex-column align-items-center mb-4">
                                <div class="form-floating mb-3 d-flex justify-content-center w-100">
                                    <input type="text" class="form-control" name="nomeModalidade" id="nomeModalidade" placeholder="Modalidade">
                                    <label for="nomeModalidade">Nome da Modalidade</label>
                                </div>
                                <button type="button" onclick="cadastroModalidade()" class="btn btn-primary w-50">Cadastrar</button>
                            </form>
                            <div class="w-100 overflow-auto">
                                <table class="table table-hover table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col" class="w-25">#</th>
                                            <th scope="col" class="w-50">Nome</th>
                                            <th scope="col" class="w-25">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabela">
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>Mark</td>
                                            <td>
                                                <a type="button" class="me-4" data-bs-toggle="modal" data-bs-target="#modalEditModalidade"><i class="bi bi-pencil-square"></i></a>
                                                <a type="button" class="ms-4" onclick="modalidadeExcluir(1)"><i class="bi bi-trash3"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <!-- Modal para Edição de dados-->
                                <div class="modal fade" id="modalEditModalidade" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalEditModalidadeLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalEditModalidadeLabel">Edição de
                                                    dados</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editFormularioModalidade">
                                                    <div class="mb-3">
                                                        <label for="nome_modalidade" class="col-form-label">Nome da
                                                            Modalidade:</label>
                                                        <input type="text" id="nomeModalidadeEditInput" class="form-control" required>
                                                        <input type="hidden" id="idModalEditModalidadeInput" value="">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                <button type="button" onclick="atualizarModalidade()" data-bs-dismiss="modal" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="professor" role="tabpanel" aria-labelledby="cadastrar-tab" tabindex="0">
                        <div class="d-flex flex-column align-items-center">
                            <p class="fs-3">Cadastro de Professores</p>
                            <form class="w-50 d-flex flex-column align-items-center mb-4">
                                <div class="form-floating mb-3 d-flex justify-content-center w-100">
                                    <input type="text" class="form-control" id="nomeProfessor" placeholder="professor">
                                    <label for="nomeProfessor">Nome do Professor</label>
                                </div>
                                <div class="form-floating mb-3 d-flex justify-content-center w-100">
                                    <input type="text" class="form-control" id="usuarioProfessor" placeholder="usuario">
                                    <label for="usuarioProfessor">Usuario </label>
                                </div>
                                <div class="form-floating mb-3 d-flex justify-content-center w-100">
                                    <input type="password" class="form-control" id="senhaProfessor" placeholder="professor">
                                    <label for="senhaProfessor">Senha</label>
                                </div>
                                <button type="button" onclick="cadastroProfessor(nomeProfessor.value, usuarioProfessor.value, senhaProfessor.value)" class="btn btn-primary w-50">Cadastrar</button>
                            </form>
                            <div class="w-100 overflow-auto">
                                <table class="table table-hover table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col" class="w-25">#</th>
                                            <th scope="col" class="w-50">Nome</th>
                                            <th scope="col" class="w-25">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelaProfessor">
                                        <tr>
                                            <th>1</th>
                                            <td>Mark</td>
                                            <td>
                                                <a type="button" class="me-4" data-bs-toggle="modal" data-bs-target="#modalEditProfessor"><i class="bi bi-pencil-square"></i></a>
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#modalExcluir" class="ms-4"><i class="bi bi-trash3"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                                <!-- Modal para Edição de dados-->
                                <div class="modal fade" id="modalEditProfessor" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalEditProfessorLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalEditProfessorLabel">Edição de
                                                    dados</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="nome_professor" class="col-form-label">Nome do
                                                            Professor:</label>
                                                        <input type="text" class="form-control" id="nomeProfessorEditInput" required>
                                                        <input type="hidden" id="idModalEditProfessorInput" value="">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                <button type="button" onclick="atualizarProfessor()" data-bs-dismiss="modal" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="cadastrar-tab" tabindex="0">
                        <div class="d-flex flex-column align-items-center">
                            <p class="fs-3">Cadastro de Endereços</p>
                            <form class="w-100 d-flex flex-column align-items-center mb-4">
                                <div class="form-floating mb-3 d-flex justify-content-center w-50">
                                    <input type="text" class="form-control" id="nomeRua" placeholder="Rua" required>
                                    <label for="nomeRua">Rua</label>
                                </div>
                                <div class="form-floating mb-3 d-flex justify-content-center w-50">
                                    <input type="text" class="form-control" id="nomeLocal" placeholder="nomeLocal" required>
                                    <label for="nomeLocal">Nome Local </label>
                                </div>
                                <div class="w-50 d-flex justify-content-between mb-4">
                                    <select class="form-select mb-2 bg-primary text-white w-50" id="selectBairro" aria-label="Default select example">
                                        <option selected>Bairro</option>
                                    </select>
                                    <button class="btn btn-primary px-4" type="button" data-bs-toggle="modal" data-bs-target="#modalAdicBairro"><i class="bi bi-plus-square"></i></button>
                                </div>

                                <button type="button" onclick="cadastroEndereco(nomeRua.value, nomeLocal.value, selectBairro.value)" class="btn btn-primary w-50">Cadastrar</button>
                            </form>
                            <div class="w-100 overflow-auto">
                                <table class="table table-hover table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col" class="col-1">#</th>
                                            <th scope="col" class="col-2">Bairro</th>
                                            <th scope="col" class="col-2">Rua</th>
                                            <th scope="col" class="col-2">Nome Local</th>
                                            <th scope="col" class="col-1">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelaEndereco">
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark Mark Mark Mark Mark Mark Mark</td>
                                            <td>Mark Mark Mark MarkMark Mark Mark</td>
                                            <td>Mark Mark Mark Mark Mark Mark Mark</td>
                                            <td>
                                                <a type="button" class="me-4" data-bs-toggle="modal" data-bs-target="#modalEditEndereco"><i class="bi bi-pencil-square"></i></a>
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#modalExcluir" class="ms-4"><i class="bi bi-trash3"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Modal para o cadastramento de um Bairro-->
                            <div class="modal fade" id="modalAdicBairro" tabindex="-1" aria-labelledby="modalAdicBairroLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalAdicBairroLabel">Adicionar bairro
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-floating mb-3 d-flex justify-content-center w-100">
                                                    <input type="text" class="form-control" id="nomeBairro" placeholder="usuario" required>
                                                    <label for="nomeBairro">Nome Bairro</label>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="button" onclick="cadastroBairro()" data-bs-dismiss="modal" class="btn btn-primary">Cadastrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal para Edição de dados-->
                            <div class="modal fade" id="modalEditEndereco" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalEditProfessorLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalEditEnderecoLabel">Edição de
                                                dados</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="mb-3">
                                                    <label for="rua" class="col-form-label">Rua:</label>
                                                    <input type="text" class="form-control" id="ruaEnderecoEditInput" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nomeLocal" class="col-form-label">Nome do
                                                        local:</label>
                                                    <input type="text" class="form-control" id="nomeLocalEnderecoEditInput" required>

                                                </div>
                                                <input type="hidden" id="idModalEditEnderecoInput" value="">
                                                <select class="form-select mb-2 bg-primary text-white w-100" id="selectBairroEdit" aria-label="Default select example">
                                                    <option selected>Bairro</option>
                                                </select>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="button" onclick="atualizarEndereco()" data-bs-dismiss="modal" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="turma" role="tabpanel" aria-labelledby="cadastrar-tab" tabindex="0">
                        <div class="d-flex flex-column align-items-center">
                            <p class="fs-3">Cadastro de Turma</p>
                            <form class="w-100 d-flex flex-column align-items-center mb-4">
                                <div class="w-100 d-block d-md-flex">
                                    <select class="form-select mb-3 me-md-4 bg-primary text-white w-100" id="selectModalidade" aria-label="Default select example">
                                        <option selected>Modalidade</option>
                                    </select>
                                    <select class="form-select mb-3 ms-md-4 bg-primary text-white w-100" id="selectProfessor" aria-label="Default select example">
                                        <option selected>Professor</option>
                                    </select>
                                </div>
                                <select class="form-select mb-3 mx-4 bg-primary text-white w-100" id="selectEndereco" aria-label="Default select example">
                                    <option selected>Endereço</option>
                                </select>
                                <div class="w-100 d-block d-md-flex">
                                    <div class="mb-3 me-md-4 d-flex justify-content-center w-100">
                                        <input type="number" min="1" max="100" placeholder="Quantidade de Vagas" class="form-control" id="quantidade_vagas" aria-label="Default select example">
                                        </input>
                                    </div>
                                    <div class="mb-3 ms-md-4 d-flex justify-content-center w-100">
                                        <input type="text" class="form-control" id="nivel" placeholder="Nivel/Tipo" required>
                                    </div>
                                </div>
                                <div class="row d-block d-md-flex text-center container-xxl">
                                    <div class="col-12 col-md-5 mt-2">
                                        <p class="fs-5">Dias da Semana</p>
                                        <div>
                                            <input type="checkbox" class="btn-check" id="dia[0]">
                                            <label class="btn btn-outline-primary" for="dia[0]" style="width: 36px;">D</label>

                                            <input type="checkbox" class="btn-check" id="dia[1]">
                                            <label class="btn btn-outline-primary" for="dia[1]" style="width: 36px;">S</label>

                                            <input type="checkbox" class="btn-check" id="dia[2]">
                                            <label class="btn btn-outline-primary" for="dia[2]" style="width: 36px;">T</label>

                                            <input type="checkbox" class="btn-check" id="dia[3]">
                                            <label class="btn btn-outline-primary" for="dia[3]" style="width: 36px;">Q</label>

                                            <input type="checkbox" class="btn-check" id="dia[4]">
                                            <label class="btn btn-outline-primary" for="dia[4]" style="width: 36px;">Q</label>

                                            <input type="checkbox" class="btn-check" id="dia[5]">
                                            <label class="btn btn-outline-primary" for="dia[5]" style="width: 36px;">S</label>

                                            <input type="checkbox" class="btn-check" id="dia[6]">
                                            <label class="btn btn-outline-primary" for="dia[6]" style="width: 36px;">S</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5 mt-2">
                                        <p class="fs-5">Horario</p>
                                        <input id="hora_inicio" class="btn btn-primary" type="time" value="13:00">
                                        ás
                                        <input id="hora_termino" class="btn btn-primary" type="time" value="14:30">
                                    </div>
                                    <div class="col-12 col-md-2 mt-4 mt-md-2 align-self-end">
                                        <button type="button" onclick="cadastroTurma(selectModalidade.value, selectProfessor.value, selectEndereco.value, 
                                        quantidade_vagas.value, nivel.value, hora_inicio.value, hora_termino.value)" class="btn btn-primary w-100">Cadastrar</button>
                                    </div>
                                </div>


                            </form>
                            <div class="w-100 overflow-auto">
                                <table class="table table-hover table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Modalidade</th>
                                            <th scope="col">Professor</th>
                                            <th scope="col">Nível</th>
                                            <th scope="col">Dias Semana</th>
                                            <th scope="col">Hórario</th>
                                            <th scope="col">Vagas</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelaTurma">
                                        <tr>
                                            <th>1</th>
                                            <td>Mark Markk</td>
                                            <td>Mark Mark </td>
                                            <td>Mark Mark </td>
                                            <td>Mark Mark </td>
                                            <td>Mark Mark</td>
                                            <td>Mark Mark </td>
                                            <td class="d-flex flex-wrap ">
                                                <a type="button" class="mx-2" data-bs-toggle="modal" data-bs-target="#modalEditTurma"><i class="bi bi-pencil-square"></i></a>
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#modalExcluir" class="mx-2"><i class="bi bi-trash3"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Modal para Edição de dados-->
                            <div class="modal fade" id="modalEditTurma" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalEditProfessorLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalEditEnderecoLabel">Edição de
                                                dados</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="text-center">
                                                <select class="form-select mb-2 bg-primary text-white w-100" id="selectTurmaModalidadeEdit" aria-label="Default select example">
                                                    <option selected>Modalidade</option>
                                                </select>
                                                <select class="form-select mb-2 bg-primary text-white w-100" id="selectTurmaProfessorEdit" aria-label="Default select example">
                                                    <option selected>Professor</option>
                                                </select>
                                                <select class="form-select mb-2 bg-primary text-white w-100" id="selectTurmaEnderecoEdit" aria-label="Default select example">
                                                    <option selected>Endereço</option>
                                                </select>
                                                <div class="mb-3 d-flex justify-content-center w-100">
                                                    <input type="text" class="form-control" id="nivelEdit" placeholder="Nivel/Tipo" required>
                                                </div>
                                                <p class="fs-5">Dias da Semana</p>
                                                <div>
                                                    <input type="checkbox" class="btn-check" id="diaEdit[0]">
                                                    <label class="btn btn-outline-primary" for="diaEdit[0]" style="width: 36px;">D</label>

                                                    <input type="checkbox" class="btn-check" id="diaEdit[1]">
                                                    <label class="btn btn-outline-primary" for="diaEdit[1]" style="width: 36px;">S</label>

                                                    <input type="checkbox" class="btn-check" id="diaEdit[2]">
                                                    <label class="btn btn-outline-primary" for="diaEdit[2]" style="width: 36px;">T</label>

                                                    <input type="checkbox" class="btn-check" id="diaEdit[3]">
                                                    <label class="btn btn-outline-primary" for="diaEdit[3]" style="width: 36px;">Q</label>

                                                    <input type="checkbox" class="btn-check" id="diaEdit[4]">
                                                    <label class="btn btn-outline-primary" for="diaEdit[4]" style="width: 36px;">Q</label>

                                                    <input type="checkbox" class="btn-check" id="diaEdit[5]">
                                                    <label class="btn btn-outline-primary" for="diaEdit[5]" style="width: 36px;">S</label>

                                                    <input type="checkbox" class="btn-check" id="diaEdit[6]">
                                                    <label class="btn btn-outline-primary" for="diaEdit[6]" style="width: 36px;">S</label>
                                                </div>
                                                <p class="fs-5">Horario</p>
                                                <input id="hora_inicioEdit" class="btn btn-primary" type="time" value="13:00">
                                                ás
                                                <input id="hora_terminoEdit" class="btn btn-primary" type="time" value="14:30">
                                                <input type="hidden" id="idModalEditTurmaInput" value="">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="button" onclick="atualizarTurma()" data-bs-dismiss="modal" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="dadosalunos" role="tabpanel" aria-labelledby="dadosalunos-tab" tabindex="0">
                        <div class="d-flex flex-column align-items-center pt-3 pb-2 mb-3">
                            <div class="d-flex justify-content-evenly flex-wrap container-md">
                                <p class="fs-4">Filtros</p>
                                <div class="d-flex flex-wrap p-1 align-items-end">
                                    <div class="btn-group me-1 d-flex flex-column">
                                        <p class="m-0">Modalidade</p>
                                        <select class="form-select bg-primary text-white" onchange="filtroMatriculas(this.value,filtroBairro.value,filtroNivel.value)" id="filtroModalidade" aria-label="Modalidade">
                                        </select>
                                    </div>
                                    <div class="btn-group me-1 ms-1 d-flex flex-column">
                                        <p class="m-0">Bairro</p>
                                        <select class="form-select bg-primary text-white" onchange="filtroMatriculas(filtroModalidade.value,this.value,filtroNivel.value)" id="filtroBairro" aria-label="Bairro">
                                        </select>
                                    </div>
                                    <div class="btn-group me-1 ms-1 d-flex flex-column">
                                        <p class="m-0">Nivel</p>
                                        <select class="form-select bg-primary text-white" onchange="filtroMatriculas(filtroModalidade.value,filtroBairro.value,this.value)" id="filtroNivel" aria-label="Nivel">
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    <p class="me-2">Numero de resultados:</p>
                                    <p class="fs-4" id="numeroResultado">0</p>
                                </div>
                            </div>
                            <div style="width: 100%;overflow-x: scroll;height: calc(60vh - 50px);">
                                <table class="table m-auto" style="width: 1090px;">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="col-1" scope="col">#</th>
                                            <th class="col-3" scope="col">Nome</th>
                                            <th class="col-2" scope="col">Modalidade</th>
                                            <th class="col-2" scope="col">Bairro</th>
                                            <th class="col-2" scope="col">Nivel</th>
                                            <th class="col-1" scope="col">Faltas</th>
                                            <th class="col-1" scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabela_matriculas">
                                    </tbody>
                                </table>
                            </div>
                            <!-- Modal para carregar os dados basicos dos aluno, anamnese, atestados-->
                            <div class="modal fade" id="modalDadosMatricula" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalExcluirModalidadeLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalExcluirLabel">Todos os dados do matriculado
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dadosBasicos" aria-expanded="true" aria-controls="collapseOne">
                                                            Dados básicos
                                                        </button>
                                                    </h2>
                                                    <div id="dadosBasicos" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="mb-3 row">
                                                                <!-- Dados do responsavel -->
                                                                <div>
                                                                    <p>Dados do responsavel</p>
                                                                    <label for="staticEmail" class="col-sm-6 col-form-label">Grau de parentesco</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Irmão">
                                                                    </div>
                                                                    <label for="staticEmail" class="col-sm-6 col-form-label">Nome do Responsavel</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Irmão Renan">
                                                                    </div>
                                                                    <label for="staticEmail" class="col-sm-6 col-form-label">RG - Responsavel</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="627777795">
                                                                    </div>
                                                                    <label for="staticEmail" class="col-sm-6 col-form-label">CPF - Responsavel</label>
                                                                    <div class="col-sm-6">
                                                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="51752547829">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <img src="https://i.pinimg.com/736x/cd/44/b5/cd44b51a80fe8dd141de1be25b76be84.jpg" class="rounded img-thumbnail" alt="..." width="100">
                                                                        <img src="https://i.pinimg.com/736x/cd/44/b5/cd44b51a80fe8dd141de1be25b76be84.jpg" class="rounded img-thumbnail" alt="..." width="100">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <p>Dados do aluno</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dadosAnamnese" aria-expanded="false" aria-controls="collapseTwo">
                                                            Anamnese
                                                        </button>
                                                    </h2>
                                                    <div id="dadosAnamnese" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dadosAtestado" aria-expanded="false" aria-controls="collapseThree">
                                                            Dados de Atestado
                                                        </button>
                                                    </h2>
                                                    <div id="dadosAtestado" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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

    <!-- Scritp de listagem de Matriculas e possui scripts para carregar os selects dos filtros -->
    <script src="../Listar Matriculas/Ajax/Listar/filtroMatriculas.js"></script>
    <script src="../Listar Matriculas/Ajax/Listar/listarModalidade.js"></script>
    <script src="../Listar Matriculas/Ajax/Listar/listarBairro.js"></script>
    <script src="../Listar Matriculas/Ajax/Listar/listarNivel.js"></script>

    <!-- Script de listagem dos dados via matricula -->
    <script src="../Listar Matriculas/Ajax/Listar/listarDadosMatriculado.js"></script>

    <!-- Script de Modalidade  -->
    <script src="../Cadastro/Ajax/Listar/modalidadeListar.js"></script>
    <script src="../Cadastro/Ajax/Inserir/modalidadeInserir.js"></script>
    <script src="../Cadastro/Ajax/Excluir/modalidadeExcluir.js"></script>
    <script src="../Cadastro/Ajax/Atualizar/modalidadeAtualizar.js"></script>

    <!-- Script de Professor  -->
    <script src="../Cadastro/Ajax/Listar/professorListar.js"></script>
    <script src="../Cadastro/Ajax/Inserir/professorInserir.js"></script>
    <script src="../Cadastro/Ajax/Excluir/professorExcluir.js"></script>
    <script src="../Cadastro/Ajax/Atualizar/professorAtualizar.js"></script>

    <!-- Script para Cadastrar/Listar Bairro -->
    <script src="../Cadastro/Ajax/Listar/bairroListar.js"></script>
    <script src="../Cadastro/Ajax/Inserir/bairroInserir.js"></script>

    <!-- Script de Enderecos -->
    <script src="../Cadastro/Ajax/Listar/enderecoListar.js"></script>
    <script src="../Cadastro/Ajax/Inserir/enderecoInserir.js"></script>
    <script src="../Cadastro/Ajax/Excluir/enderecoExcluir.js"></script>
    <script src="../Cadastro/Ajax/Atualizar/enderecoAtualizar.js"></script>

    <!-- Script de Turmas -->
    <script src="../Cadastro/Ajax/Listar/turmaListar.js"></script>
    <script src="../Cadastro/Ajax/Inserir/turmaInserir.js"></script>
    <script src="../Cadastro/Ajax/Excluir/turmaExcluir.js"></script>
    <script src="../Cadastro/Ajax/Atualizar/turmaAtualizar.js"></script>

    <!-- Script de Mudar Atributos de Modal -->
    <script src="../../../JavaScriptSistema/Gestor/Cadastro/inserirModalEdit.js"></script>
</body>

</html>