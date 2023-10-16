function listarModalidade() {
    $.ajax({
        url: "../Cadastro/PDO/Listar/listarModalidade.php",
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        var id = 1;
        var tabela = document.getElementById("tabela");
        tabela.innerHTML = "";
        result.forEach((item) => {

            var novaLinha = tabela.insertRow();
            // Crie células na linha e insira o conteúdo desejado
            var td_id = novaLinha.insertCell(0);
            var td_nome = novaLinha.insertCell(1);
            var td_acoes = novaLinha.insertCell(2);
            td_id.textContent = id++;
            td_nome.textContent = item["nome_modalidade"];
            $(td_acoes).append(`
            <a type="button" class="me-4" onclick="mudarInputModalEdit(${item["id_modalidade"]})" data-bs-toggle="modal" data-bs-target="#modalEditModalidade"><i class="bi bi-pencil-square"></i></a>
            <a type="button"  class="ms-4" onclick="modalidadeExcluir(${item["id_modalidade"]})" ><i class="bi bi-trash3"></i></a>`);

        });
    })
}
function listarModalidadeSelect() {
    $.ajax({
        url: "../Cadastro/PDO/Listar/listarModalidade.php",
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {

        var select = document.getElementById("selectModalidade");
        select.innerHTML = "";
        result.forEach((item) => {
            var option = document.createElement("option");
            option.value = item["id_modalidade"];
            option.textContent = item["nome_modalidade"];
            select.appendChild(option);
        });
    })
}

function listarModalidadeSelectEdit() {
    $.ajax({
        url: "../Cadastro/PDO/Listar/listarModalidade.php",
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {

        var select = document.getElementById("selectTurmaModalidadeEdit");
        select.innerHTML = "";
        result.forEach((item) => {
            var option = document.createElement("option");
            option.value = item["id_modalidade"];
            option.textContent = item["nome_modalidade"];
            select.appendChild(option);
        });
    })
}

function listarTudoModalidade(){
    listarModalidade();
    listarModalidadeSelect();
    listarModalidadeSelectEdit();
    listarModalidadeFiltro();
}
listarTudoModalidade()