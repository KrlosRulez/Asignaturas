<?php

namespace App\Controllers;

use App\Models\LibrosModel;
use App\Models\CategoriasModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Libros extends BaseController
{

    public function mostrarLibros()
    {

        $model = model(LibrosModel::class);

        $data = [
            'libros' => $model->getLibros(),
        ];

        return view('templates/menu', $data)
            . view('libros/view_libros')
            . view('templates/footer');

    }

    public function mostrarCategorias()
    {

        $model = model(CategoriasModel::class);

        $data = [
            'categorias' => $model->getCategorias(),
        ];

        return view('templates/menu', $data)
            . view('categorias/view_categorias')
            . view('templates/footer');

    }

    public function mostrarMenu()
    {

        return view('templates/menu')
            . view('templates/footer');

    }

}