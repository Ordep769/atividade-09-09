<?php
    require_once 'Conexao.php';
    
    class ItemPedidosDAO {
        public function getItemPedidoPorId(int $idItemPedido) {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM Item_pedido WHERE idItemPedido = :idItemPedido;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idItemPedido', $idItemPedido);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        public function create(ItemPedidoModel $itemPedido) {
            $conexao = (new Conexao())->getConexao();

            $sql = "INSERT INTO Item_pedido (idPedido, idProduto, quantidade) VALUES (:idPedido, :idProduto, :quantidade);";
           
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idPedido', $itemPedido->idPedido);
            $stmt->bindValue(':idProduto', $itemPedido->idProduto);
            $stmt->bindValue(':quantidade', $itemPedido->quantidade);
            return $stmt->execute();
        }
    
        public function update(ItemPedidoModel $itemPedido) {
            $conexao = (new Conexao())->getConexao();
            
            $sql = "UPDATE Item_pedido SET idPedido = :idPedido, idProduto = :idProduto, quantidade = :quantidade WHERE idItemPedido = :idItemPedido;";
            
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idItemPedido', $itemPedido->idItemPedido);
            $stmt->bindValue(':idPedido', $itemPedido->idPedido);
            $stmt->bindValue(':idProduto', $itemPedido->idProduto);
            $stmt->bindValue(':quantidade', $itemPedido->quantidade);
            return $stmt->execute();
        }
    
        public function delete(ItemPedidoModel $itemPedido) {
            $conexao = (new Conexao())->getConexao();
            
            $sql = "DELETE FROM Item_pedido WHERE idItemPedido = :idItemPedido;";
           
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idItemPedido', $itemPedido->idItemPedido);
            return $stmt->execute();
        }
     }
    ?>
    







