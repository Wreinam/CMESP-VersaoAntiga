<?php

require('../../conexao.php');

session_start();
$id_aluno = $_SESSION['id_inscricao'];
$id_matricula = $_POST["id_matricula"];
$id_turma = $_POST["id_turma"];

try {
    //Query responsavel por voltar o numero de vagas da turma e a quantidade de alunos matriculados naquela turma;
    $query = "SELECT quantidade_vagas, (SELECT COUNT(*) FROM matricula WHERE id_turma = :id_turma) 
    AS total_matriculas FROM turma WHERE id_turma = :id_turma;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $quantidade_vagas = $row["quantidade_vagas"];
    $total_matriculas = $row["total_matriculas"];
    //Verifica se a quantidade de vagas é maior do que de aluno já matriculados.
    if ($quantidade_vagas > $total_matriculas) {
        //Aqui a quantidade de vagas é maior, então não é preciso conferir a lista de espera, apenas fazer a exclusao da matricula.
        $stmt = $pdo->prepare("DELETE FROM matricula WHERE `id_matricula` = :id_matricula");
        $stmt->bindParam(':id_matricula', $id_matricula, PDO::PARAM_INT);
        $stmt->execute();
    } else {
        //Aqui quer dizer que as vagas estão preenchidas, necessitando verificar se exite uma lista de espera.
        //Primeiro verifica se já não exite alguma lista de espera.
        $query = "SELECT * from lista_espera WHERE `id_turma` = :id_turma;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            //Aqui existe uma lista de espera para a turma, então ao excluir a matricula deve ser relocado os outros participantes.
            $stmt = $pdo->prepare("DELETE FROM matricula WHERE `id_aluno` = :id_aluno AND `id_turma` = :id_turma");
            $stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
            $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
            $stmt->execute();
            //Depois de excluir o aluno deve-se matricular o primeiro da lista de espera.
            $query = "SELECT id_aluno, id_turma FROM lista_espera WHERE `id_turma` = :id_turma AND `posicao` = 1;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //Deve ser feita a matricula do primeiro da lista de espera.
            $query = "INSERT INTO `matricula` (`id_aluno`, `id_turma`, `status`) 
            VALUES (:id_aluno, :id_turma, 'ativo');";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_aluno', $row["id_aluno"]);
            $stmt->bindParam(':id_turma', $row["id_turma"]);
            $stmt->execute();
            //Depois de feita a matricula do primeiro da fila, sua posicao na lista de espera deve ser excluida.
            $query = "DELETE FROM lista_espera WHERE `id_aluno` = :id_aluno AND `id_turma` = :id_turma AND `posicao` = '1'";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_aluno', $row["id_aluno"], PDO::PARAM_INT);
            $stmt->bindParam(':id_turma', $row["id_turma"], PDO::PARAM_INT);
            $stmt->execute();

            //Faz a conta de quantos tinha na lista de espera.
            $query = "SELECT COUNT(*) AS total_espera from lista_espera where id_turma = :id_turma;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
            $stmt->execute();
            $rowEspera = $stmt->fetch(PDO::FETCH_ASSOC);
            $total_espera = $rowEspera["total_espera"] + 1;
            //Depois deve ser reposicionado todos que estava na fila.
            $query = "SELECT * from lista_espera where id_turma = :id_turma;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
            $stmt->execute();

            //Verifica se existe uma lista de espera
            if ($stmt->rowCount() > 0) {
                //Modificar um por um do resultado da lista de espera.
                
                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                    $id_lista_espera = $row["id_lista_espera"];
                    $posicao = $row["posicao"];
                    //Aqui é o calculo da nova posição do municipe.
                    $novaPosicao = 0;
                    $num = $total_espera - $posicao;
                    $novaPosicao = $total_espera - ($num + 1);
                    //Aqui ira fazer o update das posições.
                    $query = "UPDATE lista_espera SET posicao = :posicao WHERE id_lista_espera = :id_lista_espera";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':posicao', $novaPosicao, PDO::PARAM_INT);
                    $stmt->bindParam(':id_lista_espera', $id_lista_espera, PDO::PARAM_STR);
                    $stmt->execute();
                    
                }
            }
        } else {
            //Aqui já não existe a lista de espera, podendo apenas excluir a matricula.
            $stmt = $pdo->prepare("DELETE FROM matricula WHERE `id_matricula` = :id_matricula");
            $stmt->bindParam(':id_matricula', $id_matricula, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
