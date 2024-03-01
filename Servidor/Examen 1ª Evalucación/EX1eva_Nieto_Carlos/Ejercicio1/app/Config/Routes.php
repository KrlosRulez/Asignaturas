<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Libros;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', [Libros::class, 'mostrarMenu']);
$routes->get('libros', [Libros::class, 'mostrarLibros']);
$routes->get('categorias', [Libros::class, 'mostrarCategorias']);