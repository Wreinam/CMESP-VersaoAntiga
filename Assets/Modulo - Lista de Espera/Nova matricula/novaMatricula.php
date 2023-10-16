<?php

require('../../conexao.php');

session_start();
$id_aluno = $_SESSION['id_inscricao'];
$id_turma = $_POST["id_turma"];

try {
    $query = "SELECT CASE WHEN EXISTS (SELECT 1 FROM matricula WHERE matricula.id_aluno = :id_aluno AND matricula.id_turma = :id_turma) 
    THEN 'Matriculado' WHEN EXISTS (SELECT 1 FROM lista_espera WHERE lista_espera.id_aluno = :id_aluno AND lista_espera.id_turma = :id_turma) 
    THEN 'Espera' ELSE 'Nenhuma tabela' END AS esta_inscrito;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
    $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row["esta_inscrito"] == "Matriculado" || $row["esta_inscrito"] == "Espera") {
        echo "Matriculado";
    } else {
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
            //Se for, quer dizer que esta sobrando vagas, então somente matricula o aluno.
            $query = "INSERT INTO `matricula` (`id_aluno`, `id_turma`, `status`) 
            VALUES (:id_aluno, :id_turma, 'ativo');";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
            $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            //Se não for, o municipe é colocado em uma lista de espera.
            //Primeiro verifica se já não exite alguma lista de espera.
            $query = "SELECT COUNT(*) AS total_espera FROM lista_espera WHERE id_turma = :id_turma";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $total_espera = $row["total_espera"];
            if ($total_espera > 0) {
                //Aqui quer dizer que ja existe uma lista de espera pra essa turma.
                //Então já que existe a lista de espera deve-se inserir o aluno na posicao dele.
                $query = "INSERT INTO lista_espera (id_aluno, id_turma, posicao) 
                VALUES (:id_aluno, :id_turma, :posicao)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
                $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
                $total_espera++;
                $stmt->bindParam(':posicao', $total_espera, PDO::PARAM_INT);
                $stmt->execute();
                echo "Espera";
            } else {
                //Aqui quer dizer que não existe nenhuma lista de espera para aquela turma.
                //Como não existe lista de espera é so inserir o aluno e vai automanticamente na posição 1.
                $query = "INSERT INTO lista_espera (`id_aluno`, `id_turma`) 
                VALUES (:id_aluno, :id_turma)";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
                $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
                $stmt->execute();
                echo "Espera";

            }
        }
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
