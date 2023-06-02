<?php

namespace App\Controllers;

use UserModel;

class Usuario extends BaseController
{   
    
    public $model =NULL;
    public function __construct()
    {
        $this->model = model('UserModel');
        $this->session = \Config\Services::session();
    }
    public function iniciar_sesion()
    {  
        return view('estructura/header').view('iniciar_sesion');
    }
    public function registro_usuario(){
        return view('estructura/header').view('registro_usuario');
    }
    public function registro_usuario_hecho(){
        $data=[
            "nombre"=> $_POST['nombre'],
            "apellidos"=> $_POST['apellidos'],
            "telefono"=> $_POST['telefono'],
            "email"=> $_POST['email'],
            "contrasena"=> password_hash($_POST['contrasena'],PASSWORD_BCRYPT),
            "esadmin"=> 0
        ];
        $this->model->insertar_usuario($data);
        return redirect()->to(base_url('/index'));
    }

    public function registro_empresa(){
        return view('estructura/header').view('registro_empresa');
    }
    public function registro_empresa_hecho(){
        $data=[
            "nombre"=> $_POST['nombre'],
            "apellidos"=> $_POST['apellidos'],
            "telefono"=> $_POST['telefono'],
            "email"=> $_POST['email'],
            "pais"=> $_POST['pais'],
            "ciudad"=> $_POST['ciudad'],
            "direccion"=> $_POST['direccion'],
            "contrasena"=> password_hash($_POST['contrasena'],PASSWORD_BCRYPT),
            "esadmin"=> 1
        ];
        $this->model->insertar_usuario($data);
        return redirect()->to(base_url('/index'));
    }

    public function iniciar_sesion_hecho() {
        $datos=$this->model->validate_user($_POST['email'],$_POST['contrasena']);
        if ($datos!=null) {
            $session = session();
            $session->set($datos);
            return redirect()->to(base_url('/'));
        }else{
            return view('estructura/header').view('iniciar_sesion');
        }
    }
    public function cerrar_sesion(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/usuario/iniciar_sesion'));
    }
    public function perfil_usuario()
    {
        if (session('esadmin') == 0 && session('email') != null) {
            $usuario["datos_usuario"] = $this->model->get_usuario(session('email'));
            return view('estructura/header').view('perfil_usuario',$usuario);
        }else{
            return redirect()->to(base_url('/index'));
        }
        
    }
    public function modificar_perfil_usuario()
    {
        if (session('esadmin') == 0 && session('email') != null) {
            $usuario["datos_usuario"] = $this->model->get_usuario(session('email'));
            return view('estructura/header').view('modificar_perfil_usuario',$usuario);
        }else{
            return redirect()->to(base_url('/index'));
        }
    }
    public function modificar_perfil_usuario_hecho()
    {
        $id=session("id");
        $data=[
            "nombre"=> $_POST['nombre'],
            "apellidos"=> $_POST['apellidos'],
            "telefono"=> $_POST['telefono'],
            "email"=> $_POST['email'],
            "pais"=> session("pais"),
            "ciudad"=> session("ciudad"),
            "direccion"=> session("direccion")
        ];
        $this->model->modificar_usuario($id,$data);
        return redirect()->to(base_url('/usuario/perfil_usuario'));
    }
    public function modificar_direccion()
    {
        if (session('esadmin') == 0 && session('email') != null) {
            $usuario["datos_usuario"] = $this->model->get_usuario(session('email'));
            return view('estructura/header').view('modificar_direccion',$usuario);
        }else{
            return redirect()->to(base_url('/index'));
        }
    }
    public function modificar_direccion_hecho()
    {
        $id=session("id");
        $data=[
            "nombre"=> session("nombre"),
            "apellidos"=> session("apellidos"),
            "telefono"=> session("telefono"),
            "email"=> session("email"),
            "pais"=> $_POST['pais'],
            "ciudad"=> $_POST['ciudad'],
            "direccion"=> $_POST['direccion']
        ];
        $this->model->modificar_usuario($id,$data);
        return redirect()->to(base_url('/usuario/perfil_usuario'));
    }
    public function perfil_empresa()
    {
        if (session('esadmin') == 1 && session('email') != null) {
            $usuario["datos_empresa"] = $this->model->get_usuario(session('email'));
            return view('estructura/header').view('perfil_empresa',$usuario);
        }else{
            return redirect()->to(base_url('/index'));
        }
        
    }
    public function modificar_perfil_empresa()
    {
        if (session('esadmin') == 1 && session('email') != null) {
            $usuario["datos_empresa"] = $this->model->get_usuario(session('email'));
            return view('estructura/header').view('modificar_perfil_empresa',$usuario);
        }else{
            return redirect()->to(base_url('/index'));
        }
    }

    public function modificar_perfil_empresa_hecho()
    {
        $id=session("id");
        $data=[
            "nombre"=> $_POST['nombre'],
            "apellidos"=> $_POST['apellidos'],
            "telefono"=> $_POST['telefono'],
            "email"=> $_POST['email'],
            "pais"=> $_POST['pais'],
            "ciudad"=> $_POST['ciudad'],
            "direccion"=> $_POST['direccion']
        ];
        $this->model->modificar_usuario($id,$data);
        return redirect()->to(base_url('/usuario/perfil_empresa'));
    }
    public function dar_baja_usuario(){
        if ((session('esadmin') == 0 || session('esadmin') == 1) && session('email') != null) {
            return view('estructura/header').view('dar_baja_usuario');
        }else{
            return redirect()->to(base_url('/index'));
        }
    }
    public function dar_baja_usuario_hecho(){
        $contrasena = session("contrasena");
        if(password_verify($_POST['contrasena'],$contrasena)){
            $id=session('id');
            $this->model->eliminar_usuario($id);
            return redirect()->to(base_url('/usuario/cerrar_sesion'));
            
        }else{
            $datos["error"] = true;
            return view('estructura/header').view('dar_baja_usuario',$datos);
        }
        
    }
}
