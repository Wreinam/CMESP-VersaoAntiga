function listarDadosMatriculado(id_matricula) {
    $.ajax({
        url: "../Listar Matriculas/PDO/Listar/listarDadosMatriculado.php",
        method: 'POST',
        dataType: 'json',
        data: {id_matricula: id_matricula}
    }).done(function (result) {
        console.log(result);
    })
}