<?php

namespace App\Controllers;

use CodeIgniter\Cookie\Cookie;

use CodeIgniter\HTTP\Response;

use UserModel;

class Pedido extends BaseController
{
    public $model = NULL;
    public function __construct()
    {
        $this->model = model('UserModel');
    }
    public function pagar()
    {
        if (session('esadmin') == 0 && session('email') != null && isset($_COOKIE["carrito"])) {
            if ($_POST["opciones_pago"] == "efectivo") {
                $id_usuario=session("id");
                $fecha = date("Y-m-d H:i:s");
                $data = [
                    "id_usuario_cliente" => $id_usuario,
                    "fecha" => $fecha
                ];
                $this->model->insertar_pedido($data);
                $id_pedido = $this->model->get_id_pedido($id_usuario,$fecha);
                $carritoActual = $_COOKIE['carrito'];
                $carrito = json_decode($carritoActual, true);

                for ($i = 0; $i < count($carrito); $i++) {
                    $stockActual = $this->model->get_stock($carrito[$i]["id_producto"]);
                        $datos = [
                            "id_producto" => $carrito[$i]["id_producto"],
                            "id_pedido" => $id_pedido,
                            "cantidad" => $carrito[$i]["cantidad"]
                        ];
                        $this->model->insertar_producto_pedido($datos);
                        $stock = [
                            "stock" => $stockActual-$carrito[$i]["cantidad"]
                        ];
                        $this->model->restar_stock($carrito[$i]["id_producto"],$stock);
                }
                
                setcookie('carrito', '', time() - 3600, '/');

                return view('estructura/header') . view('compra_hecha');
            } else if ($_POST["opciones_pago"] == "paypal") {
                $id_usuario=session("id");
                $fecha = date("Y-m-d H:i:s");
                $data = [
                    "id_usuario_cliente" => $id_usuario,
                    "fecha" => $fecha
                ];
                $this->model->insertar_pedido($data);
                $id_pedido = $this->model->get_id_pedido($id_usuario,$fecha);
                $carritoActual = $_COOKIE['carrito'];
                $carrito = json_decode($carritoActual, true);

                for ($i = 0; $i < count($carrito); $i++) {
                    $stockActual = $this->model->get_stock($carrito[$i]["id_producto"]);
                        $datos = [
                            "id_producto" => $carrito[$i]["id_producto"],
                            "id_pedido" => $id_pedido,
                            "cantidad" => $carrito[$i]["cantidad"]
                        ];
                        $this->model->insertar_producto_pedido($datos);
                        $stock = [
                            "stock" => $stockActual-$carrito[$i]["cantidad"]
                        ];
                        $this->model->restar_stock($carrito[$i]["id_producto"],$stock);
                }
                
                setcookie('carrito', '', time() - 3600, '/');

                return view('estructura/header') . view('compra_hecha');
            }
            return redirect()->to(base_url('/usuario/iniciar_sesion'));
        } else {
            return redirect()->to(base_url('/index'));
        }
    }
    public function pedidos()
    {
        if (session('esadmin') == 0 && session('email') != null){
            if($this->model->pedido_list() == NULL){
                return redirect()->to(base_url('/index'));
            }
            $pedidos["datos_pedidos"] = $this->model->pedido_list();
            return view('estructura/header').view('pedidos',$pedidos);
        }else{
            return redirect()->to(base_url('/index'));
        }
    }
}
