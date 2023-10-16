function deslogar(){
    $.ajax({
        url: '../../Modulo - Lista de Espera/Cancelamento de Matricula/cancelaMatricula.php',
    }).done(function () {
        window.location.replace('../../../');
    })
}