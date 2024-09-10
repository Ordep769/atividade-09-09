<?php
   
  require_once 'DAO/ItemPedidosDAO.php';
            
    class ItemPedidoModel {
        public ?int $idItemPedido;
        public ?int $idPedido;
        public ?int $idProduto;
        public ?int $quantidade;
            
        public function __construct(
        ?int $idItemPedido = null,
        ?int $idPedido = null,
        ?int $idProduto = null,
        ?int $quantidade = null
    ) {
         $this->idItemPedido = $idItemPedido;
         $this->idPedido = $idPedido;
         $this->idProduto = $idProduto;
         $this->quantidade = $quantidade;
      }
            
        public function create() {
          $itemPedidoDAO = new ItemPedidosDAO();
           return $itemPedidoDAO->create($this);
     }
            
        public function getItemPedidoPorId(int $idItemPedido) {
          $itemPedidoDAO = new ItemPedidosDAO();
           return $itemPedidoDAO->getItemPedidoPorId($idItemPedido);
    }
            
        public function update() {
         $itemPedidoDAO = new ItemPedidosDAO();
          return $itemPedidoDAO->update($this);
    }
            
       public function delete() {
        $itemPedidoDAO = new ItemPedidosDAO();
          return $itemPedidoDAO->delete($this);
    }
    
  }
 ?>
            