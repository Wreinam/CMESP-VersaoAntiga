function listarListaEspera() {
    $.ajax({
        url: '../Lista Espera/PDO/Listar/listarListaEspera.php',
        method: 'POST',
    }).done(function (result) {
        var array = JSON.parse(result);
        //Verifica se o array está vazio ou não.
        if (isJSONEmpty(array)) {
            //Aqui ele esta vazio.
            //Ao momento faz nada.
        } else {
            //Aqui possui algum conteudo no JSON.
            document.getElementById("lista-espera-tab").disabled = false;
            array.forEach((item) => {

                $("#listaEspera_div").append(`
                
                <div class="card text-bg-light mb-3" style="max-width: 18rem; min-width: 15rem;">
                <div class="card-header pb-0 d-flex justify-content-between">
                  <p class="fs-5">${item["nome_modalidade"]}</p>
                </div>
                <div class="modal fade" id="cancelarmatriculamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cancelar Matricula</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Deseja realmente cancelar sua matricula nessa turma?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sim</button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Não</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <p class="card-text mb-2 fs-6">Posição: ${item["posicao"]}</p>
                  <p class="card-text mb-2 fs-6">Nivél: ${item["nivel"]}</p>
                  <p class="card-text mb-2 fs-6">Horario: ${item["horario_inicio"]} : ${item["horario_termino"]}</p>
                  <p class="card-text mb-2 fs-6">Dias da semana: ${diasSemana(item["dias_semana"])}</p>
                  <p class="card-text mb-2 fs-6">Rua: ${item["rua"]}</p>
                  <p class="card-text mb-2 fs-6">Nome Local: ${item["nome_local"]}</p>

                </div>
              </div>
                
                
                `);
            })
        }
    })
}
function isJSONEmpty(obj) {
    //Se Json estiver vazio retorna verdadeiro
    return Object.keys(obj).length === 0;
}
listarListaEspera();