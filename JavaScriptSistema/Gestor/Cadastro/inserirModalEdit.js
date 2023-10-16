function mudarInputModalEdit(id_modalidade){
    document.getElementById("idModalEditModalidadeInput").value = id_modalidade;
    $.ajax({
        url: '../Cadastro/PDO/Listar/listarModalidadeId.php',
        method: 'POST',
        data: { id_modalidade: id_modalidade},
    }).done(function (result) {
        var array = JSON.parse(result);
        document.getElementById("nomeModalidadeEditInput").value = array[0]["nome_modalidade"];
    })
}

function mudarInputModalEditProfessor(id_professor){
    document.getElementById("idModalEditProfessorInput").value = id_professor;
    $.ajax({
        url: '../Cadastro/PDO/Listar/listarProfessorId.php',
        method: 'POST',
        data: { id_professor: id_professor}
    }).done(function (result) {
        var array = JSON.parse(result);
        document.getElementById("nomeProfessorEditInput").value = array[0]["nome_professor"];
    })
}

function mudarInputModalEditEndereco(id_endereco){
    document.getElementById("idModalEditEnderecoInput").value = id_endereco;
    $.ajax({
        url: '../Cadastro/PDO/Listar/listarEnderecoId.php',
        method: 'POST',
        data: { id_endereco: id_endereco}
    }).done(function (result) {
        var array = JSON.parse(result);
        document.getElementById("ruaEnderecoEditInput").value = array[0]["rua"];
        document.getElementById("nomeLocalEnderecoEditInput").value = array[0]["nome_local"];
        document.getElementById("selectBairroEdit").value = array[0]["bairro"];
    })
}

function mudarInputModalEditTurma(id_turma){
    document.getElementById("idModalEditTurmaInput").value = id_turma;
    $.ajax({
        url: '../Cadastro/PDO/Listar/listarTurmaId.php',
        method: 'POST',
        data: { id_turma: id_turma}
    }).done(function (result) {
        var array = JSON.parse(result);
        document.getElementById("selectTurmaModalidadeEdit").value = array[0]["id_modalidade"];
        document.getElementById("selectTurmaProfessorEdit").value = array[0]["id_professor"];
        document.getElementById("selectTurmaEnderecoEdit").value = array[0]["id_endereco"];
        document.getElementById("nivelEdit").value = array[0]["nivel"];

        var dias_semana = array[0]["dias_semana"];
        for (let index = 0; index < 7; index++) {
            document.getElementById(`diaEdit[${index}]`).checked = false;
        }
        for (let index = 0; index < 7; index++) {
            if(dias_semana[index] == 1)
            document.getElementById(`diaEdit[${index}]`).checked = true;
        }
        
        document.getElementById("hora_inicioEdit").value = array[0]["horario_inicio"];
        document.getElementById("hora_terminoEdit").value = array[0]["horario_termino"];
    })
}