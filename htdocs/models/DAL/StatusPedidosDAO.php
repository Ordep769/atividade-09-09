<?php 
   require_once 'Conexao.php';

   class StatusPedidosDAO {
       public function getStatusPedido() {
           $conexao = (new Conexao())->getConexao();

           $sql = "SELECT * FROM status;";

           $stmt = $conexao->prepare($sql);
           $stmt->execute();

           return $stmt->fetchAll(PDO::FETCH_ASSOC);
       }
       
       
    
   }
   ?>
   















?>