]<?php 
    require_once './models/PedidoModel.php';

class PedidoController {
    
    public function getPedido() {
        $pedidoModel = new PedidoModel();
        $pedido = $pedidoModel->getPedido(); 
        
        return json_encode([
            'error' => null,
            'result' => $pedido
        ]);
    }
    
    public function getPedidoPorId() {
        $dados = json_decode(file_get_contents('php://input'), true);

        if (empty($dados['idPedido'])) {
            return $this->mostrarErro('Você deve informar o idPedido!');
        }

        $pedidoModel = new PedidoModel();
        $pedido = $pedidoModel->getPedidoPorId($dados['idPedido']); 

        return json_encode([
            'error' => null,
            'result' => $pedido
        ]); 
    }

    public function PedidosPessoa() {
        $dados = json_decode(file_get_contents('php://input'), true);

        if(empty($dados['id_usuario'])) {
            return $this->mostrarErro('Você de informar o idPedidoPessoa');
        }

        $pedidoModel = new PedidoModel(); 
        $pedido = $pedidoModel->getPedidoPessoa($dados['idPedidoPessoa']);
        
        return json_encode([
            'error' => null,
            'result' =>$pedido
        ]);
        
    }
    public function cadastrarPedido() {
        $dados = json_decode(file_get_contents('php://input'), true);

        if (empty($dados['descricaoPedido'])) {
            return $this->mostrarErro('Você deve informar o idPedido');
        }
        if (empty($dados['id_usuario'])) {
            return $this->mostrarErro('Você deve informar o idPedido');
        }

        $pedido = new pedidoModel(
            null,
            $dados['idStatus'],
            $dados['id_usuario']
        );

        $pedido->create(); 

        return json_encode([
            'error' => null,
            'result' => true
        ]);
    }

    public function updatePedido() {
        $dados = json_decode(file_get_contents('php://input'), true);

        if (empty($dados['idPedido'])) {
            return $this->mostrarErro('Você deve informar o idPedido!');
        }

        if (empty($dados['descricaoPedido'])) {
            return $this->mostrarErro('Você deve informar a descricaoPedido!');
        }

        if (empty($dados['precoPedido'])) {
            return $this->mostrarErro('Você deve informar o precoPedido!');
        }

        $pedido = new PedidoModel(
            $dados['idPedido'],
            $dados['descricaoPedido'],
            $dados['precoPedido'] 
        );

        $pedido->update(); 

        return json_encode([
            'error' => null,
            'result' => true
        ]);
    }

    public function updateStatusPedido() {
        $dados = json_decode(file_get_contents('php://input'), true);

        if (empty($dados['idPedido'])) {
            return $this->mostrarErro('Você deve informar o idPedido');
        
        if (empty($dados['idStatus'])) {
            return $this->mostrarErro('Você deve informar o idStatus');
        }

        $pedidoModel = new PedidoModel($dados['idPedido'], $dados['idStatus']);
        $pedidoModel->updateStatusPedido();
        
        return json_encode([
          'error' => null,
          'result' => true  
        ]);
       }
    }
    
    public function deletePedido() {
        $dados = json_decode(file_get_contents('php://input'), true);

        if (empty($dados['idPedido'])) {
            return $this->mostrarErro('Você deve informar o idPedido');
        }

        $pedidoModel = new PedidoModel($dados['idPedido']);
        $pedidoModel->delete(); 

        return json_encode([
            'error' => null,
            'result' => true
        ]);
    }

    private function mostrarErro(string $mensagem) {
        return json_encode([
            'error' => $mensagem,
            'result' => null
        ]);
    }
}
?>


