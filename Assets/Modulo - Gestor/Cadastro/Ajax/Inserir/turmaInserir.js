function cadastroTurma(id_modalidade, id_professor, id_endereco, quantidade_vagas, nivel, horario_inicio, horario_termino) {
    function juntarDias() {
        var dias = "";
        for (let index = 0; index <= 6; index++) {
            if (document.getElementById(`dia[${index}]`).checked) {
                dias = dias + "1";
            } else {
                dias = dias + "0";
            }
        }
        return dias;
    };
    var dias_semana = juntarDias();
    $.ajax({
        url: '../Cadastro/PDO/Inserir/turmaInserir.php',
        method: 'POST',
        data: {
            id_modalidade: id_modalidade, id_professor: id_professor, id_endereco: id_endereco,
            quantidade_vagas: quantidade_vagas, nivel: nivel, dias_semana: dias_semana,
            horario_inicio: horario_inicio, horario_termino: horario_termino
        },
    }).done(function () {
        
        document.getElementById("quantidade_vagas").value = "";
        document.getElementById("nivel").value = "";

        for (let index = 0; index < 7; index++) {
            document.getElementById(`dia[${index}]`).checked = false;
        }
        const toastLiveExample = document.getElementById('notificaoSucesso');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        toastBootstrap.show();
        listarTurma();
        listarNivelFiltro();
    })
}