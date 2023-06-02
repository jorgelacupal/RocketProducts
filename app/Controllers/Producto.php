<?php

namespace App\Controllers;

use CodeIgniter\Cookie\Cookie;

use CodeIgniter\HTTP\Response;

use UserModel;

class Producto extends BaseController
{
    public $model =NULL;
    public function __construct()
    {
        $this->model = model('UserModel');
    }
    public function index()
    {
        $productos["datos_productos"] = $this->model->producto_list();
        return view('estructura/header').view('index',$productos);
    }



    public function gestionar_productos(){
        if (session('esadmin') == 1 && session('email') != null) {
            $productos["datos_productos"] = $this->model->producto_list_empresa(session('id'));
            return view('estructura/header').view('gestionar_productos',$productos);
        }else{
            return redirect()->to(base_url('/index'));
        }
        
    }
    
    public function anadir_producto(){
        if (session('esadmin') == 1 && session('email') != null) {
            return view('estructura/header').view('anadir_producto');
        }else{
            return redirect()->to(base_url('/index'));
        }
        
    }
    public function anadir_producto_hecho(){
        if ($this->request->getFile('imagen')->isValid()) {
            $imagen = $this->request->getFile('imagen');
            $imagen->move(ROOTPATH . 'public/img');
            $nombreArchivo = $imagen->getName();
            $data=[
                "id_empresa"=> session("id"),
                "nombre"=> $_POST['nombre'],
                "descripcion"=> $_POST['descripcion'],
                "precio"=> $_POST['precio'],
                "stock"=> $_POST['stock'],
                "imagen"=> $nombreArchivo
            ];
            $this->model->insertar_producto($data);
            return redirect()->to(base_url('usuario/gestionar_productos'));
        } else {
            return redirect()->to('usuario/anadir_producto');
        }
    }

    public function eliminar_producto($id_producto){
        if (session('esadmin') == 1 && session('email') != null) {
            $this->model->eliminar_producto($id_producto);
            return redirect()->to(base_url('usuario/gestionar_productos'));
        }else{
            return redirect()->to(base_url('/index'));
        }
        
    }

    public function modificar_producto($id_producto){
        if (session('esadmin') == 1 && session('email') != null) {
            $datos["datos_producto"] = $this->model->get_producto($id_producto);
            return view('estructura/header').view('modificar_producto',$datos);
        }else{
            return redirect()->to(base_url('/index'));
        }
        
    }

    public function modificar_producto_hecho(){
        $id_producto=$_POST['id_producto'];
        if ($this->request->getFile('imagen')->isValid()) {
            $imagen = $this->request->getFile('imagen');
            $imagen->move(ROOTPATH . 'public/img');
            $nombreArchivo = $imagen->getName();
            $data=[
                "nombre"=> $_POST['nombre'],
                "descripcion"=> $_POST['descripcion'],
                "precio"=> $_POST['precio'],
                "stock"=> $_POST['stock'],
                "imagen"=> $nombreArchivo
            ];
            $this->model->modificar_producto($id_producto,$data);
            return redirect()->to(base_url('/mostrar_producto'.$id_producto));
        } else {
            $data=[
                "nombre"=> $_POST['nombre'],
                "descripcion"=> $_POST['descripcion'],
                "precio"=> $_POST['precio'],
                "stock"=> $_POST['stock'],
            ];
            $this->model->modificar_producto($id_producto,$data);
            return redirect()->to(base_url('/mostrar_producto'.$id_producto));
        }
    }

    public function insertar(){
        $data=[
            "titulo"=> $_POST['titulo'],
            "elaboracion"=> $_POST['elaboracion'],
            "ingredientes"=> $_POST['ingredientes'],
            "tipo"=> $_POST['tipo'],
            "dificultad"=> $_POST['dificultad']
        ];
        $this->model->insertar_producto($data);
        return redirect()->to(base_url('/index'));
    }

    public function mostrar_producto($id_producto){
        $datos["datos_producto"] = $this->model->get_producto($id_producto);
        $datos["datos_comentario"] = $this->model->list_comentarios($id_producto);
        if($datos["datos_producto"]==NULL){
            return redirect()->to(base_url('/index'));
        }else{
            return view('estructura/header').view('mostrar_producto',$datos);
        }
        
    }
    
    public function comprar_producto($id_producto){

        if (session('esadmin') == 0 && session('email') != null) {
            if(isset($cookie)){
                if($cookie->getName()=="productos"){
                    $valor=$cookie->getValue().",".$id_producto;
                    $cookie = new Cookie(
                        'productos',
                        $valor,
                        [
                            'expires'  => (3600*24*365),
                            'prefix'   => '__Secure-',
                            'path'     => '/',
                            'domain'   => '',
                            'secure'   => true,
                            'httponly' => true,
                            'raw'      => false,
                            'samesite' => Cookie::SAMESITE_LAX,
                        ]
                    );
                }
            }else{
            $cookie = new Cookie(
                'productos',
                $id_producto,
                [
                    'expires'  => (3600*24*365),
                    'prefix'   => '__Secure-',
                    'path'     => '/',
                    'domain'   => '',
                    'secure'   => true,
                    'httponly' => true,
                    'raw'      => false,
                    'samesite' => Cookie::SAMESITE_LAX,
                ]
            );
        }
        $valor_cookie=[
            "nombre"=> $cookie->getName(),
            "valor"=> $cookie->getValue()
        ];
        $datos["cookie"] = $valor_cookie ;
        return view('estructura/header').view('/ver_carrito',$datos);
        }else{
            return redirect()->to(base_url('/index'));
        }
    }
    public function ver_carrito(){
        if (session('esadmin') == 0 && session('email') != null && isset($_COOKIE["carrito"])) {
            $productos["datos_productos"] = $this->model->producto_list();
            return view('estructura/header').view('ver_carrito',$productos);
        }else{
            return redirect()->to(base_url('/index'));
        }
    }
    
    public function anadir_comentario(){
        $data=[
            "id_producto"=> $_POST['id_producto'],
            "id_usuario"=> $_POST['id_usuario'],
            "comentario"=> $_POST['comentario']
        ];
        $this->model->insertar_producto_usuario($data);
        return redirect()->to(base_url('/mostrar_producto'.$_POST['id_producto']));
    }
}
