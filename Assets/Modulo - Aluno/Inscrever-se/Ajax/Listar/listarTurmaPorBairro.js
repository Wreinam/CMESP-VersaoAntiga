function listarTurmaSelect(nome_bairro, id_modalidade) {
    console.log(nome_bairro)
    $.ajax({
        url: "../Inscrever-se/PDO/Listar/listarTurmaPorBairro.php",
        method: 'POST',
        dataType: 'json',
        data: { nome_bairro: nome_bairro, id_modalidade:id_modalidade},
    }).done(function (result) {
        var select = document.getElementById("select_lista_turma");
        select.innerHTML = "";
        result.forEach((item) => {
            var option = document.createElement("option");
            option.value = item["id_turma"];
            //${item[""]}
            option.textContent = `Nível: ${item["nivel"]} | Horario: ${item["horario_inicio"]} ás ${item["horario_termino"]} 
            | Professor: ${item["nome_professor"]} | Vagas: ${item["quantidade_vagas"]} | Rua: ${item["rua"]} 
            | Nome do Local: ${item["nome_local"]} | Dias da Semana: ${diasSemana(item["dias_semana"])}`;
            select.appendChild(option);
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