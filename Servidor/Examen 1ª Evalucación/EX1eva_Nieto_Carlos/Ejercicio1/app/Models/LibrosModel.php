<?php

namespace App\Models;

use CodeIgniter\Model;

class LibrosModel extends Model
{

    protected $table = 'libros';

    protected $allowedFields = ['titulo', 'id_categoria', 'precio'];

    public function getLibros($id = false)
    {

        $sql = $this->select('libros.*, categorias.categoria');
        $sql = $this->join('categorias', 'libros.id_categoria=categorias.id_categoria');

        if ($id === false) {

            $sql = $this->orderBy('libros.id_libro');
            $sql = $this->findAll();

        } else {

            $sql = $this->where(['libros.id_libro' => $id]);
            $sql = $this->first();

        }

        return $sql;

    }

}