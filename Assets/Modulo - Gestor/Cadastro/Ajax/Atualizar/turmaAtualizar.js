function atualizarTurma() {
    var id_turma = $('#idModalEditTurmaInput').val();
    var id_modalidade = $('#selectTurmaModalidadeEdit').val();
    var id_professor = $('#selectTurmaProfessorEdit').val();
    var id_endereco = $('#selectTurmaEnderecoEdit').val();
    var nivel = $('#nivelEdit').val();

    function juntarDias() {
        var dias = "";
        for (let index = 0; index <= 6; index++) {
            if (document.getElementById(`diaEdit[${index}]`).checked) {
                dias = dias + "1";
            } else {
                dias = dias + "0";
            }
        }
        return dias;
    };
    var dias_semana = juntarDias();
    var horario_inicio = $('#hora_inicioEdit').val();
    var horario_termino = $('#hora_terminoEdit').val();
    $.ajax({
        url: '../Cadastro/PDO/Atualizar/turmaAtualizar.php',
        method: 'POST',
        data: { id_turma: id_turma, id_modalidade: id_modalidade, id_professor: id_professor, 
            id_endereco: id_endereco, nivel: nivel, dias_semana: dias_semana, horario_inicio: horario_inicio,
            horario_termino: horario_termino},
    }).done(function () {
        const toastLiveExample = document.getElementById('notificaoSucesso');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
        listarTurma();
    })
}