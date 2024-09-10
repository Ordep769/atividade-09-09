<?php
require_once 'Conexao.php';
require_once 'StatusModel.php'; 

class StatusDAO {

    public function getStatus() {
        $conexao = (new Conexao())->getConexao();

        $sql = "SELECT * FROM Status;";

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createStatus(StatusModel $status) {
        $conexao = (new Conexao())->getConexao();

        $sql = "INSERT INTO Status (descricaoStatus) VALUES (:descricaoStatus);";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':descricaoStatus', $status->descricaoStatus);

        return $stmt->execute();
    }

    public function updateStatus(StatusModel $status) {
        $conexao = (new Conexao())->getConexao();

        $sql = "UPDATE Status SET descricaoStatus = :descricaoStatus WHERE idStatus = :idStatus;";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':descricaoStatus', $status->descricaoStatus);
        $stmt->bindValue(':idStatus', $status->idStatus);

        return $stmt->execute();
    }

    public function deleteStatus(StatusModel $status) {
        $conexao = (new Conexao())->getConexao();

        $sql = "DELETE FROM Status WHERE idStatus = :idStatus;";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idStatus', $status->idStatus);

        return $stmt->execute();
    }

    public function getStatusById($idStatus) {
        $conexao = (new Conexao())->getConexao();

        $sql = "SELECT * FROM Status WHERE idStatus = :idStatus;";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idStatus', $idStatus);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>

    
       