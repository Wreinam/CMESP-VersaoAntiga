function listarNivelFiltro() {
    $.ajax({
        url: "../Listar Matriculas/PDO/Listar/listarNivel.php",
        method: 'POST',
        dataType: 'json',
    }).done(function (result) {
        var select = document.getElementById("filtroNivel");
        select.innerHTML = "";
        var optionTodos = document.createElement("option");
            optionTodos.value = "todos";
            optionTodos.textContent = "Todos";
            select.appendChild(optionTodos);
        result.forEach(element => {
            var option = document.createElement("option");
            option.value = element["nivel"];
            option.textContent = element["nivel"];
            select.appendChild(option);
        });
    })
}
listarNivelFiltro();