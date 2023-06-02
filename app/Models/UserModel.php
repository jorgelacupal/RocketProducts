<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    public function producto_list()
    {
        $producto = $this->db->table("producto");
        $resultado = $producto->get()->getResult();

        if (count($resultado) >= 1) {
            return $resultado;
        } else {
            return NULL;
        }
    }
    public function producto_list_empresa($id_empresa)
    {
        $producto = $this->db->table("producto");
        $producto->where('id_empresa', $id_empresa);
        $resultado = $producto->get()->getResult();

        if (count($resultado) >= 1) {
            return $resultado;
        } else {
            return NULL;
        }
    }

    public function get_producto($id_produto)
    {
        $usuario = $this->db->table("producto");
        $usuario->where('id', $id_produto);
        $resultado = $usuario->get()->getResult();
        if (count($resultado) >= 1) {
            return $resultado;
        } else {
            return NULL;
        }
    }
    public function insertar_producto($datos)
    {
        $recetas = $this->db->table("producto");
        $recetas->insert($datos);
        return $this->db->insertID();
    }
    public function modificar_producto($id, $datos)
    {
        $recetas = $this->db->table("producto");
        $recetas->set($datos);
        $recetas->where('id', $id);
        return $recetas->update();
    }
    public function eliminar_producto($id)
    {
        $recetas = $this->db->table("producto");
        return $recetas->where('id', $id)->delete();
    }
    public function get_usuario($email)
    {
        $usuario = $this->db->table("usuario");
        $usuario->where('email', $email);
        $resultado = $usuario->get()->getResult();
        if (count($resultado) >= 1) {
            return $resultado;
        } else {
            return NULL;
        }
    }

    public function usuario_list()
    {
        $sql = "SELECT * FROM usuario ;";
        $query = $this->db->query($sql);
        $result = $query->getResult();

        if (count($result) >= 1) {
            return $result;
        } else {
            return NULL;
        }
    }
    public function insertar_usuario($datos)
    {
        $usuario = $this->db->table("usuario");
        $usuario->insert($datos);
        return $this->db->insertID();
    }
    public function modificar_usuario($id, $datos)
    {
        $usuario = $this->db->table("usuario");
        $usuario->set($datos);
        $usuario->where('id', $id);
        return $usuario->update();
    }
    public function eliminar_usuario($id)
    {
        $usuario = $this->db->table("usuario");
        return $usuario->where('id', $id)->delete();
    }




    public function inicio_sesion_hecho($datos)
    {
        $usuario = $this->db->table("usuario");
        $usuario->set($datos);
        $usuario->where('id', $id);
        $usuario->where('id', $password);
        return $usuario;
    }

    public function validate_user($email, $pass)
    {
        $usuario = $this->db->table("usuario");
        $usuario->where('email', $email);
        $resultado = $usuario->get()->getRowArray();
        if (password_verify($pass, $resultado['contrasena'])) {
            return $resultado;
        } else {
            return null;
        }
    }

    public function pedido_list()
    {
        $producto = $this->db->table("pedido");
        $resultado = $producto->get()->getResult();
        if (count($resultado) >= 1) {
            return $resultado;
        } else {
            return NULL;
        }
    }

    public function insertar_pedido($datos)
    {
        $usuario = $this->db->table("pedido");
        $usuario->insert($datos);
        return $this->db->insertID();
    }

    public function get_id_pedido($id_usuario_cliente, $fecha)
    {
        $producto = $this->db->table("pedido");
        $producto->select("id");
        $producto->where("fecha", $fecha);
        $producto->where("id_usuario_cliente", $id_usuario_cliente);
        $resultado = $producto->get()->getRow();

        if (!empty($resultado)) {
            return $resultado->id;
        } else {
            return null;
        }
    }
    public function insertar_producto_pedido($datos)
    {
        $usuario = $this->db->table("producto_pedido");
        $usuario->insert($datos);
        return $this->db->insertID();
    }

    public function restar_stock($id, $stock)
    {
        $recetas = $this->db->table("producto");
        $recetas->set($stock);
        $recetas->where('id', $id);
        return $recetas->update();
    }
    public function get_stock($id_producto)
    {
        $producto = $this->db->table("producto");
        $producto->select("stock");
        $producto->where("id", $id_producto);
        $resultado = $producto->get()->getRow();

        if (!empty($resultado)) {
            return $resultado->stock;
        } else {
            return null;
        }
    }

    public function list_comentarios($id_producto)
    {
        $producto = $this->db->table("producto_usuario");
        $resultado = $producto->get()->getResult();
        if (count($resultado) >= 1) {
            return $resultado;
        } else {
            return NULL;
        }
    }

    public function insertar_producto_usuario($datos)
    {
        $usuario = $this->db->table("producto_usuario");
        $usuario->insert($datos);
        return $this->db->insertID();
    }
    
}
