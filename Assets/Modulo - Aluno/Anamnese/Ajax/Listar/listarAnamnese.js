function listarAnamnese() {
    $.ajax({
        url: '../Anamnese/PDO/Listar/listarAnamnese.php',
        method: 'POST',
    }).done(function (result) {
        var array = JSON.parse(result);
        anamneseDados = array[0];
        $("#botao_div").empty();
        //Essa função verifica se a anamnese do municipe existe ou não.
        if (isJSONEmpty(array)) {
            $("#botao_div").append(`<button type="button" onclick="inserirAnamnese()" class="btn btn-success m-4">Enviar Anamnese</button>`)
        } else {
            $("#botao_div").append(`<button type="button" onclick="atualizarAnamnese()" class="btn btn-success m-4">Atualizar Anamnese</button>`);

            //Daqui em diante esta responsavel por mostrar os dados da anamense para o municipe.
            if (anamneseDados["cardiaco"] == "on") {
                document.getElementById("obs_cardiaco").value = anamneseDados["obs_cardiaco"];
            } else {
                document.getElementById("radioCardiaco1").checked = false;
                document.getElementById("radioCardiaco2").checked = true;
                document.getElementById("inputCardiaco").classList.add("d-none");
                document.getElementById("obs_cardiaco").value = "";
            }

            //Na hora que puxa os dados, se o municipe não fez o lançamento da anamnese
            //estes botões não podem mostrar a ele.
            document.getElementById("matriculas-tab").disabled = false;
            document.getElementById("cadastroturma-tab").disabled = false;

            
        }

    })
}
function isJSONEmpty(obj) {
    //Se Json estiver vazio retorna verdadeiro
    return Object.keys(obj).length === 0;
}
listarAnamnese();