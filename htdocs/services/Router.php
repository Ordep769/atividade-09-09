<?php
    class Router {
        private array $routes;

        public function __construct() {
            $this->routes = [
                'GET' => [
                    '/usuarios' => [
                        'controller' => 'UsuarioController',
                        'function' => 'getUsuarios'
                    ],
                    '/status' => [
                        'controller' => 'StatusController',
                        'function' => 'getStatus'
                    ],
                    '/produtos' => [
                        'controller' => 'ProdutoController',
                        'function' => 'getProduto'
                    ],
                    '/pedidos' => [
                        'controller' => 'PedidoController',
                        'function' => 'getPedido'
                    ],
                  
                ],
                'POST' => [
                    '/usuario' => [
                        'controller' => 'UsuarioController',
                        'function' => 'createUsuario'
                    ],
                    '/cadastrar-usuario' => [
                        'controller' => 'UsuarioController',
                        'function' => 'createUsuario'
                    ],
                    '/produto' => [
                        'controller' => 'ProdutoController',
                        'function' => 'createProduto'
                    ],
                    '/cadastrar-produtos' => [
                        'controller' => 'ProdutoController',
                        'function' => 'createProduto'
                    ],
                    '/criar-Itens-Pedidos' => [
                        'controller' => 'ItenPedidoController',
                        'function' => 'getItensPedido'
                    ],
                    '/item-pedido' => [
                        'controller' => 'ItensPedidosController',
                        'function' => 'getItensPedido'
                    ],
                    '/pedido' => [
                        'controller' => 'PedidoController',
                        'function' => 'createPedido'
                    ],
                    '/cadastrar-pedido' =>[
                        'cadastrar-pedido' => 'CadastrarPedidos',
                        'function' => 'getCadastrarPedidos'
                    ],
                    '/pedido-pessoa' => [
                        '/pedido-pessoa' => 'PedidoPessoaController',
                        'function' => 'getPedidosPessoa'
                    ],
                    '/valor-total-pedido' => [
                        'controller' => 'valorTotalPedidosController',
                        'function' => 'getValorTotalPedido'
                    ]
                ],
                'PUT' => [
                    '/atualizar-usuario' => [
                        'controller' => 'UsuarioController',
                        'function' => 'updateUsuario'
                    ],
                    '/atualizar-produto' => [
                        'controller' => 'ProdutosController',
                        'function' => 'updateProduto'
                    ],
                    '/atualizar-item-pedido' => [
                        'controller' => 'item-pedidoController',
                        'function' => 'updateItem-pedido' 
                    ],
                    '/atualizar-pedido' => [
                        'controller' => 'PedidoController',
                        'function' => 'updatePedido' 
                    ],
                    '/atualizar-status-pedido' => [
                        'controller' => 'statusPedidoController',
                        'function' => 'updateStatusPedido' 
                    ]
                ],
                'DELETE' => [
                    '/excluir-usuario' => [
                        'controller' => 'UsuarioController',
                        'function' => 'deleteUsuario'
                    ],
                    '/excluir-produto' => [
                        'controller' => 'ProdutoController',
                        'function' => 'deleteProduto'
                    ],
                    '/excluir-item-pedido' => [
                        'controller' => 'itemPedidosController',
                        'function' => 'deleteitemPedido'
                    ],
                    '/excluir-pedido' => [
                        'controller' => 'PedidosController',
                        'function' => 'deletePedido'
                        
                    ]

                ]
            ];
        }

        public function handleRequest(string $method, string $route): string {
            $routeExists = !empty($this->routes[$method][$route]);

            if (!$routeExists) {
                return json_encode([
                    'error' => 'Essa rota não existe!',
                    'result' => null
                ]);
            }

            $routeInfo = $this->routes[$method][$route];

            $controller = $routeInfo['controller'];
            $function = $routeInfo['function'];

            require_once __DIR__ . '/../controllers/' . $controller . '.php';

            return (new $controller)->$function();
        }
    }
?>