function listarTurma() {
    $.ajax({
        url: "../Cadastro/PDO/Listar/listarTurma.php",
        method: 'GET',
        dataType: 'json'
    }).done(function (result) {
        var id = 1;
        var tabela = document.getElementById("tabelaTurma");
        tabela.innerHTML = "";
        result.forEach((item) => {
            var novaLinha = tabela.insertRow();
            // Crie células na linha e insira o conteúdo desejado
            var td_id = novaLinha.insertCell(0);
            var td_modalidade = novaLinha.insertCell(1);
            var td_professor = novaLinha.insertCell(2);
            var td_nivel = novaLinha.insertCell(3);
            var td_dias_semana = novaLinha.insertCell(4);
            var td_horario = novaLinha.insertCell(5);
            var td_vagas = novaLinha.insertCell(6);
            var td_acoes = novaLinha.insertCell(7);
            td_id.textContent = id++;
            td_modalidade.textContent = item["nome_modalidade"];
            td_professor.textContent = item["nome_professor"];
            td_nivel.textContent = item["nivel"];
            td_dias_semana.textContent = diasSemana(item["dias_semana"]);
            td_horario.textContent = item["horario_inicio"] + " ás " + item["horario_termino"];
            td_vagas.textContent = item["quantidade_vagas"];
            $(td_acoes).append(`
            <a type="button" class="me-4" onclick="mudarInputModalEditTurma(${item["id_turma"]})" data-bs-toggle="modal" data-bs-target="#modalEditTurma"><i class="bi bi-pencil-square"></i></a>
            <a type="button" class="ms-4" onclick="turmaExcluir(${item["id_turma"]})" ><i class="bi bi-trash3"></i></a>`);

        });
        
    })
}

function diasSemana(diasSemanaString){
    var dias = "";

    for (let num = 0; num <= 6; num++) {
        if(diasSemanaString[0] == 1 && num == 0 ){
            dias += "DOM"
        }
        if(diasSemanaString[1] == 1 && num == 1 ){
            dias += "SEG"
        }
        if(diasSemanaString[2] == 1 && num == 2 ){
            dias += "TER"
        }
        if(diasSemanaString[3] == 1 && num == 3 ){
            dias += "QUA"
        }
        if(diasSemanaString[4] == 1 && num == 4 ){
            dias += "QUI"
        }
        if(diasSemanaString[5] == 1 && num == 5 ){
            dias += "SEX"
        }
        if(diasSemanaString[6] == 1 && num == 6 ){
            dias += "SAB"
        }
        if(diasSemanaString[num] == 1){
            dias += " | "
        }
    }
    return dias;
}


listarTurma()
