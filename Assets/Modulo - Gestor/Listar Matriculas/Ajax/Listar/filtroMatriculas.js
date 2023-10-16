function filtroMatriculas(modalidade, bairro, nivel) {
    $.ajax({
        url: "../Listar Matriculas/PDO/Listar/filtroMatriculas.php",
        method: 'POST',
        dataType: 'json',
        data: { modalidade: modalidade, bairro: bairro, nivel: nivel }
    }).done(function (result) {
        let tBody = document.getElementById('tabela_matriculas');
        console.log(result)
        tBody.innerText = '';
        var filtrado = [];
        result.forEach((listaAlunos => {
            if ((listaAlunos["nome_modalidade"] == modalidade || modalidade == "todos") & (listaAlunos["bairro"] == bairro || bairro == "todos") & (listaAlunos["nivel"] == nivel || nivel == "todos")) {
                filtrado.push(listaAlunos)
            }
        }))
        let id = 0;
        filtrado.forEach((item) => {
            let tr = tBody.insertRow();
            let td_id = tr.insertCell();
            let td_nome = tr.insertCell();
            let td_modalidade = tr.insertCell();
            let td_bairro = tr.insertCell();
            let td_nivel = tr.insertCell();
            let td_faltas = tr.insertCell();
            let td_acoes = tr.insertCell();
            id++;
            td_id.innerText = id;
            td_nome.innerText = item["nome_aluno"];
            td_modalidade.innerText = item["nome_modalidade"];
            td_bairro.innerText = item["bairro"];
            td_nivel.innerText = item["nivel"];
            td_faltas.innerText = item["quant_faltas"];
            $(td_acoes).append(`
            <a type="button" class="" onclick="listarDadosMatriculado(${item["id_matricula"]})" data-bs-toggle="modal" data-bs-target="#modalDadosMatricula"><i class="bi bi-info-square"></i></a>
            <a type="button"  class="ms-4" onclick="" ><i class="bi bi-trash3"></i></a>`);
        })
        document.getElementById("numeroResultado").innerText = id;
    })
}
filtroMatriculas("todos", "todos", "todos")