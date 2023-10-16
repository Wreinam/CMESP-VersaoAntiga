function listarModalidadeFiltro() {
    $.ajax({
        url: "../Listar Matriculas/PDO/Listar/listarModalidade.php",
        method: 'POST',
        dataType: 'json',
    }).done(function (result) {
        var select = document.getElementById("filtroModalidade");
        select.innerHTML = "";
        var optionTodos = document.createElement("option");
            optionTodos.value = "todos";
            optionTodos.textContent = "Todos";
            select.appendChild(optionTodos);
        result.forEach(element => {
            var option = document.createElement("option");
            option.value = element["nome_modalidade"];
            option.textContent = element["nome_modalidade"];
            select.appendChild(option);
        });
    })
}
listarModalidadeFiltro();