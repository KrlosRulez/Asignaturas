<?php require("check_session.php"); ?>

<?php 

  if (isset($_SESSION["tiempo"])) {

    $tiempo_inactivo = 15; // Segundos

    $tiempo_sesion = time() - $_SESSION["tiempo"];

    if ($tiempo_sesion > $tiempo_inactivo) {

      session_start();
      session_destroy();
      unset($_SESSION["tiempo"]);

      header("location:login.php?tiempo");

    } else {
      $_SESSION["tiempo"] = time();
    }

  }

?>

<!doctype html>
<html lang="es" data-bs-theme="auto">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.118.2">

  <title>Album example · Bootstrap v5.3</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="CSS/styles.css">

  <script src="../assets/js/color-modes.js"></script>

  <script src="JS/funciones.js"></script>

</head>

<?php 

  include("PHP/resize-class.php");

  include("PHP/funcionalidad.php");

?>

<body>

  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path
        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path
        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path
        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path
        d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>

  <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
      aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
          aria-pressed="false">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#sun-fill"></use>
          </svg>
          Light
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
          aria-pressed="false">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#moon-stars-fill"></use>
          </svg>
          Dark
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
          aria-pressed="true">
          <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
            <use href="#circle-half"></use>
          </svg>
          Auto
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
    </ul>
  </div>


  <header data-bs-theme="dark">
    <!-- <div class="collapse text-bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4>About</h4>
            <p class="text-body-secondary">Add some information about the album below, the author, or any other
              background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link
              them off to some social networking sites or contact information.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4>Contact</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Follow on Twitter</a></li>
              <li><a href="#" class="text-white">Like on Facebook</a></li>
              <li><a href="#" class="text-white">Email me</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div> -->

    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="privada.php" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2"
            viewBox="0 0 24 24">
            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
            <circle cx="12" cy="13" r="4" />
          </svg>
          <strong>Álbum</strong>
        </a>
        <a href="login.php?no_session" class="navbar-brand d-flex align-items-center">
          Cerrar Sesión
        </a>
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
          aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
      </div>
    </div>
  </header>

  <main>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Colección de Álbumes</h1>
          <p class="lead text-body-secondary">Colección de Álbumes de Don Krlos, también conocido en las tierras altas
            como Krlos el Centurión.</p>
          <p>

            <!-- Mostrar enlaces a todos los álbumes -->

            <?php $albumes = scandir("albumes"); ?>

            <?php

            for ($i = 2; $i < count($albumes); $i++) {

              if (is_dir("albumes/" . $albumes[$i])) {
              ?>

                <a href="<?php echo "privada.php?album=" . $albumes[$i]; ?>" class="btn btn-primary my-2"><?php echo $albumes[$i]; ?></a>

              <?php
              }
            
            }

            ?>

            <br />

            <a href="privada.php?estructura" class="btn btn-danger my-2">Ver estructura</a>

            <a href="privada.php?nuevo_album" class="btn btn-danger my-2">Crear Nuevo Álbum</a>

          </p>
        </div>
      </div>
    </section>

    <?php 

    // Formulario para crear nuevo álbum

    if (isset($_GET['nuevo_album'])) {
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="text-center">

    Nombre del nuevo álbum <input type="text" name="nombre"><br /><br />
    <input type="submit" name="crear" value="Crear álbum">

    </form>

    <?php

    } 

    ?>

    <!-- div de la miniatura -->

    <?php 
    
    if (isset($_GET['album'])) { 

    $album = $_GET['album'];

    ?>

    <h1>Álbum: <?php echo $album; ?></h1>

    <!-- Botones para renombrar y eliminar el álbum -->

    <p class="text-center">

      <button class="btn btn-success my-2" onclick="renombrar_album('<?php echo $album ?>')">
          Cambiar Nombre del álbum
      </button>

    <?php 
    
    if (isset($_SESSION["admin"])) { 
      
    ?>

      <button class="btn btn-success my-2" onclick="eliminar_album('<?php echo $album ?>')">
          Eliminar álbum
      </button>

    <?php 
  
    } 
    
    ?>

    </p>

    <br />

    <!-- Formulario para subir imágenes al álbum -->
        
    <h3 class="text-center">Subir Imagen</h3>

    <br />

    <!-- El formulario se procesará en la página del álbum que se esté visualizando -->

    <form method="post" action="<?php echo "privada.php?album=" . $album; ?>" enctype="multipart/form-data" class="text-center">

    Subir imagen <input type="file" name="foto"><br /><br />
    <input type="submit" name="enviar" value="Subir a <?php echo $album; ?>">

    </form>

    <br />

    <?php

    $imagenes = scandir("albumes/$album/");

    if (count($imagenes) > 3) { // . .. y thumbs

    ?>

    <div class="album py-5 bg-body-tertiary">

      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <?php

    // Mostrar fotos (las miniaturas se ven con mala calidad) del álbum

    for ($i = 2; $i < count($imagenes); $i++ ) {

    if (is_file("albumes/$album/" . $imagenes[$i])) { // No mostrar carpetas thumbs
    
    ?>

          <div class="col">

            <div class="card shadow-sm">

              <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg"
                role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"> -->

                <title>Miniatura</title>

                <!-- <rect width="100%" height="100%" fill="#55595c" /> -->
                <!-- <text x="50%" y="50%" fill="#eceeef"
                dy=".3em">Thumbnail</text> -->

                <!-- <a href="<?php //echo "albumes/$album/" . $imagenes[$i]; ?>" width="400" target="_blank"> -->
                  <img src="<?php echo "albumes/$album/" . $imagenes[$i]; ?>" width="100%" height="240" /><br />
                <!-- </a> -->

              <!-- </svg> -->

              <div class="card-body">

                <p class="card-text"><?php echo $imagenes[$i]; ?></p>

                <div class="d-flex justify-content-between align-items-center">

                  <div class="btn-group">

                    <!-- Botones -->

                    <?php 
    
                    if (isset($_SESSION["admin"])) { 
      
                    ?>

                    <button class="btn btn-sm btn-outline-secondary" onclick="eliminar('<?php echo $album ?>', '<?php echo $imagenes[$i]; ?>')">
                      Eliminar
                    </button>

                    <?php 
                    
                    }

                    ?>

                    <button class="btn btn-sm btn-outline-secondary" onclick="renombrar_imagen('<?php echo $album ?>', '<?php echo $imagenes[$i]; ?>')">
                      Renombrar
                    </button>

                    <?php 
    
                    if (isset($_SESSION["admin"])) { 
      
                    ?>

                    <a href="<?php echo "albumes/$album/" . $imagenes[$i]; ?>" class="btn btn-sm btn-outline-secondary" style="padding-top: 14px;" download>Descargar</a>

                    <?php } else { ?>

                      <a href="<?php echo "albumes/$album/" . $imagenes[$i]; ?>" class="btn btn-sm btn-outline-secondary" download>Descargar</a>

                    <?php } ?>

                    <a href="<?php echo "albumes/$album/" . $imagenes[$i]; ?>" width="400" target="_blank" class="btn btn-sm btn-outline-secondary">Ver Imagen</a>

                    <!-- Fin Botones -->

                  </div>

                </div>

                <br />

                <form method="post" action="<?php echo "privada.php?album=" . $album; ?>">

                  <input type="submit" name="mover_js" value="Mover a"> &nbsp;

                  <input type="hidden" name="img" value="<?php echo $imagenes[$i]; ?>">

                  <input type="hidden" name="album" value="<?php echo $album; ?>">

                  <select name="nuevo_album">

                  <?php
                    for ($x = 2; $x < count($albumes); $x++) {

                      if (is_dir("albumes/" . $albumes[$x]) && $albumes[$x] != $album) {
                  ?>

                        <option value="<?php echo $albumes[$x]; ?>"><?php echo $albumes[$x]; ?></option>
              
                  <?php
                      }

                    }
                  ?>

                  </select>

                  <small class="text-body-secondary"><?php echo "desde " . $album ?></small>

                </form>

              </div>

            </div>

          </div>

    <?php

    }

    } 

    ?>

        </div>

      </div>
      
    </div>

    <?php 

    }
  
    } 
    
    ?>

    <!-- Final de el div de la miniatura -->

  </main>

  <footer class="text-body-secondary py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Volver Arriba</a>
      </p>
      <p class="mb-1">Colección de álbumes de Krlos el Maestro de Ceremonias.</p>
      <p class="mb-0">No digas nada, solo gózalo.</p>
    </div>
  </footer>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>