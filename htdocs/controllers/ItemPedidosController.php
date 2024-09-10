<?php 
    require_once './models/ItemPedidoModel.php';

class ItemPedidosController {
        
    public function getItemPedidoPorId() {
        $dados = json_decode(file_get_contents('php://input'), true);

        if (empty($dados['idPedido'])) {
            return $this->mostrarErro('Você deve informar o idItemPedido!');
        }
       
        $itemPedidoModel = new itemPedidoModel();
        $item = $itemPedidoModel->getItemPedidoPorId($dados['idItemPedido']); 

        return json_encode([
            'error' => null,
            'result' => $item
        ]);
    }
    public function cadastrarItemPedido() {
        $dados = json_decode(file_get_contents('php://input'), true);

        if (empty($dados['idPedido'])) {
            return $this->mostrarErro('Você deve informar a idPedido!');
        }
        if (empty($dados['idProduto'])) {
            return $this->mostrarErro('Você deve informar o idProduto!');
            
        }
        if (empty($dados['quantidade'])) {
            return $this->mostrarErro('Você deve informar o quantidade!');
        }

        $item = new ItemPedidoModel(
            null,
            $dados['idPedido'],
            $dados['idProduto'],
            $dados['quantidade']
        );

        $item->create(); 

        return json_encode([
            'error' => null,
            'result' => true
        ]);
    }

    public function updateproduto() {
        $dados = json_decode(file_get_contents('php://input'), true);

        if (empty($dados['idItemPedido'])) {
            return $this->mostrarErro('Você deve informar o idItemPedido!');
        }

        if (empty($dados['idPedido'])) {
            return $this->mostrarErro('Você deve informar a idPedido!');
        }
        if (empty($dados['idProduto'])) {
            return $this->mostrarErro('Você deve informar o idProduto!');
            
        }
        if (empty($dados['quantidade'])) {
            return $this->mostrarErro('Você deve informar o quantidade!');
        }

        $item = new ItemPedidoModel(
            $dados['idItemPedido'],
            $dados['idPedido'],
            $dados['idProduto'],
            $dados['quantidade']
        );

        $item->update(); 

        return json_encode([
            'error' => null,
            'result' => true
        ]);
    }

   
    public function excluirItemPedido() {
        $dados = json_decode(file_get_contents('php://input'), true);

        if (empty($dados['idItemPedido'])) {
            return $this->mostrarErro('Você deve informar o idItemPedido');
        }

        $itemPedidoModel = new ItemPedidoModel($dados['idItemPedido']);
        $itemPedidoModel->delete(); 

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


