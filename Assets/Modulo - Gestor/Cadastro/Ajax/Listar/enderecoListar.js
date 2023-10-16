function listarEndereco() {
    $.ajax({
        url: "../Cadastro/PDO/Listar/listarEndereco.php",
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        var id = 1;
        var tabela = document.getElementById("tabelaEndereco");
        tabela.innerHTML = "";
        result.forEach((item) => {

            var novaLinha = tabela.insertRow();
            // Crie células na linha e insira o conteúdo desejado
            var td_id = novaLinha.insertCell(0);
            var td_bairro = novaLinha.insertCell(1);
            var td_rua = novaLinha.insertCell(2);
            var td_nome_local = novaLinha.insertCell(3);
            var td_acoes = novaLinha.insertCell(4);

            td_id.textContent = id++;
            td_bairro.textContent = item["bairro"];
            td_rua.textContent = item["rua"];
            td_nome_local.textContent = item["nome_local"];
            $(td_acoes).append(`
            <a type="button" class="me-4" onclick="mudarInputModalEditEndereco(${item["id_endereco"]})" data-bs-toggle="modal" data-bs-target="#modalEditEndereco"><i class="bi bi-pencil-square"></i></a>
            <a type="button"  class="ms-4" onclick="enderecoExcluir(${item["id_endereco"]})" ><i class="bi bi-trash3"></i></a>`);

        });
    })
}

function listarEnderecoSelect() {
    $.ajax({
        url: "../Cadastro/PDO/Listar/listarEndereco.php",
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        var select = document.getElementById("selectEndereco");
        select.innerHTML = "";
        result.forEach((item) => {
            var option = document.createElement("option");
            option.value = item["id_endereco"];
            option.textContent = `Bairro: ${item["bairro"]} | Rua: ${item["rua"]} | Nome Local: ${item["nome_local"]}`;
            select.appendChild(option);
        });
    })
}

function listarEnderecoSelectEdit() {
    $.ajax({
        url: "../Cadastro/PDO/Listar/listarEndereco.php",
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        var select = document.getElementById("selectTurmaEnderecoEdit");
        select.innerHTML = "";
        result.forEach((item) => {
            var option = document.createElement("option");
            option.value = item["id_endereco"];
            option.textContent = `Bairro: ${item["bairro"]} | Rua: ${item["rua"]} | Nome Local: ${item["nome_local"]}`;
            select.appendChild(option);
        });
    })
}

function listarTudoEndereco(){
    listarEndereco();
    listarEnderecoSelect();
    listarEnderecoSelectEdit();
}
listarTudoEndereco()