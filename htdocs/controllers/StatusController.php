
<?php 
    require_once './models/statusPedidoModel.php';

    class StatusController {
        public function getStatus() {
            $statusPedidoModel = new statusPedidoModel();
            $status = $statusPedidoModel->getStatusPedido();

           
            return json_encode([
                'error' => null,
                'result' => $status
            ]);
        }

}
?>
