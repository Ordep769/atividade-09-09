<?php
require_once 'Conexao.php';

class PedidoDAO {
    private ?int $idStatus;
    private ?int $idUsuario;

    public function __construct(
        ?int $idStatus = null,
        ?int $idUsuario = null
    ) {
        $this->idStatus = $idStatus;
        $this->idUsuario = $idUsuario;
    }

    public function getPedido() {
        $conexao = (new Conexao())->getConexao();
        $sql = "SELECT * FROM Pedido;";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(PedidoModel $pedido) {
        $conexao = (new Conexao())->getConexao();

        $sql = "INSERT INTO Pedido (idPedido, idUsuario, idStatus) VALUES (NULL, :idUsuario, :idStatus);";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idUsuario', $pedido->idUsuario);
        $stmt->bindValue(':idStatus', $pedido->idStatus);
        return $stmt->execute();
    }

    public function update(PedidoModel $pedido) {
        $conexao = (new Conexao())->getConexao();

        $sql = "UPDATE Pedido SET idStatus = :idStatus, idUsuario = :idUsuario WHERE idPedido = :idPedido;";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPedido', $pedido->idPedido);
        $stmt->bindValue(':idStatus', $pedido->idStatus);
        $stmt->bindValue(':idUsuario', $pedido->idUsuario);
        return $stmt->execute();
    }

    public function delete(PedidoModel $pedido) {
        $conexao = (new Conexao())->getConexao();

        $sql = "DELETE FROM Pedido WHERE idPedido = :idPedido;";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPedido', $pedido->idPedido);
        return $stmt->execute();
    }

    public function getPedidoPorId(int $idPedido) {
        $conexao = (new Conexao())->getConexao();
        
        $sql = "SELECT * FROM Pedido WHERE idPedido = :idPedido;";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPedido', $idPedido);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPedidoPessoa(int $idUsuario) {
        $conexao = (new Conexao())->getConexao();

        $sql = "SELECT * FROM Pedido WHERE idUsuario = :idUsuario;";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idUsuario', $idUsuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatusPedido(PedidoModel $pedido) {
        $conexao = (new Conexao())->getConexao();

        $sql = "UPDATE Pedido SET idStatus = :idStatus WHERE idPedido = :idPedido;";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idPedido', $pedido->idPedido);
        $stmt->bindValue(':idStatus', $pedido->idStatus);
        return $stmt->execute();
    }
}
?>
