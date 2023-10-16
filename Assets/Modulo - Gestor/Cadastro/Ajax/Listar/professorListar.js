function listarProfessor() {
    $.ajax({
        url: "../Cadastro/PDO/Listar/listarProfessor.php",
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        var id = 1;
        var tabela = document.getElementById("tabelaProfessor");
        tabela.innerHTML = "";
        result.forEach((item) => {

            var novaLinha = tabela.insertRow();
            // Crie células na linha e insira o conteúdo desejado
            var td_id = novaLinha.insertCell(0);
            var td_nome = novaLinha.insertCell(1);
            var td_acoes = novaLinha.insertCell(2);
            td_id.textContent = id++;
            td_nome.textContent = item["nome_professor"];
            $(td_acoes).append(`
            <a type="button" class="me-4" onclick="mudarInputModalEditProfessor(${item["id_professor"]})" data-bs-toggle="modal" data-bs-target="#modalEditProfessor"><i class="bi bi-pencil-square"></i></a>
            <a type="button"  class="ms-4" onclick="professorExcluir(${item["id_professor"]})" ><i class="bi bi-trash3"></i></a>`);

        });
    })
}

function listarProfessorSelect() {
    $.ajax({
        url: "../Cadastro/PDO/Listar/listarProfessor.php",
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        var selectProfessor = document.getElementById("selectProfessor");
        selectProfessor.innerHTML = "";
        result.forEach((item) => {
            var optionProfessor = document.createElement("option");
            optionProfessor.value = item["id_professor"];
            optionProfessor.textContent = item["nome_professor"];
            selectProfessor.appendChild(optionProfessor);
        });
    })
}

function listarProfessorSelectEdit() {
    $.ajax({
        url: "../Cadastro/PDO/Listar/listarProfessor.php",
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        var selectProfessor = document.getElementById("selectTurmaProfessorEdit");
        selectProfessor.innerHTML = "";
        result.forEach((item) => {
            var optionProfessor = document.createElement("option");
            optionProfessor.value = item["id_professor"];
            optionProfessor.textContent = item["nome_professor"];
            selectProfessor.appendChild(optionProfessor);
        });
    })
}

function listarTudoProfessor(){
    listarProfessor();
    listarProfessorSelect();
    listarProfessorSelectEdit();
}
listarTudoProfessor();