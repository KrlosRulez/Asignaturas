<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriasModel extends Model
{

    protected $table = 'categorias';

    protected $allowedFields = ['id_categoria', 'categoria'];

    public function getCategorias($id = false)
    {

        $sql = $this->select('categorias.*');

        if ($id === false) {

            $sql = $this->orderBy('categorias.id_categoria');
            $sql = $this->findAll();

        } else {

            $sql = $this->where(['categorias.id_categoria' => $id]);
            $sql = $this->first();

        }

        return $sql;

    }

}