<?php
require_once 'DAL/PedidoDAO.php';

class PedidoModel {
    public ?int $idPedido;
    public ?int $idStatus;
    public ?int $idUsuario;

    public function __construct(
        ?int $idPedido = null,
        ?int $idStatus = null,
        ?int $idUsuario = null
    ) {
        $this->idPedido = $idPedido;
        $this->idStatus = $idStatus;
        $this->idUsuario = $idUsuario;
    }

    public function getPedido() {
        $pedidoDAO = new PedidoDAO();
        return $pedidoDAO->getPedido();
    }

    public function getPedidoPorId(int $idPedido) {
        $pedidoDAO = new PedidoDAO();
        return $pedidoDAO->getPedidoPorId($idPedido);
    }

    public function create() {
        $pedidoDAO = new PedidoDAO($this->idStatus, $this->idUsuario);
        return $pedidoDAO->create($this);
    }

    public function getPedidoPessoa(int $idUsuario) {
        $pedidoDAO = new PedidoDAO();
        return $pedidoDAO->getPedidoPessoa($idUsuario);
    }

    public function update() {
        $pedidoDAO = new PedidoDAO();
        return $pedidoDAO->update($this);
    }

    public function updateStatusPedido() {
        $pedidoDAO = new PedidoDAO();
        return $pedidoDAO->updateStatusPedido($this);
    }

    public function delete() {
        $pedidoDAO = new PedidoDAO();
        return $pedidoDAO->delete($this);
    }
}
?>
