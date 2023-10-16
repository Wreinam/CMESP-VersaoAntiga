function listarBairroFiltro() {
    $.ajax({
        url: "../Listar Matriculas/PDO/Listar/listarBairro.php",
        method: 'POST',
        dataType: 'json',
    }).done(function (result) {
        var select = document.getElementById("filtroBairro");
        select.innerHTML = "";
        var optionTodos = document.createElement("option");
            optionTodos.value = "todos";
            optionTodos.textContent = "Todos";
            select.appendChild(optionTodos);
        result.forEach(element => {
            var option = document.createElement("option");
            option.value = element["nome_bairro"];
            option.textContent = element["nome_bairro"];
            select.appendChild(option);
        });
    })
}
listarBairroFiltro()