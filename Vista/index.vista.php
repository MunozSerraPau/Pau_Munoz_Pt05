<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./Style/index.css">
    <title>HOME</title>
</head>
<body>

    <!-- Script per fer la comprovació de eliminar el campio i que no s'elimini directament -->
    <script>
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que quieres eliminar este artículo?");
        }
    </script>

    <?php include_once "./Controlador/controladorUsuaris.php" ?>
    
    <!-- Mirem si estem logeats i obtenim el nom del Usari amb el que estem -->
    <?php if(isset($_SESSION['usuari'])): $nomUsuari = $_SESSION['usuari'] ?>
        <!--aqui crear els selects pero nomes els que tinguin el nickname amb que s'ha iniciat secció  -->
        <header>
            <!-- Enlace a la izquierda para "Home" -->
            <div class="home">
                <a href="./index.php">Home</a>
            </div>
            
            <!-- Título centrado -->
            <div class="title">
                <h1><?php echo $nomUsuari ?></h1>
            </div>
            <!-- Perfil desplegable a la derecha -->
            <div class="profile-dropdown">
                <button class="profile-btn">
                    <img src="https://via.placeholder.com/40" alt="Icono Perfil" class="profile-icon">
                    <?php echo $nomUsuari ?>
                </button>
                <div class="dropdown-content">
                    <a href="./Controlador/controladorLogOut.php" >Log Out</a>
                    <a href="./Vista/canviarContrasenya.vista.php">Caniviar Contrasenya</a>
                </div>
            </div>
        </header>
        <h1 style="text-align: center; margin-top: 25px;"><strong>CAMPEONS</strong></h1>
        
        <br> <br>

        <div class="d-grid gap-2 col-3 mx-auto">
            <a style="height: 50px;" class="btn btn-primary" type="button" href="./Vista/afegir.vista.php"><i class="bi bi-plus-circle-fill"></i></a>
        </div>

        <div class="row row-cols-1 row-cols-md-4 g-5">
            <!-- foreach per mostrar tos els campions que tenim d'una manera que es mostran com cartes -->
            <?php foreach ($campeons as $champion): ?>
                <div class="col">
                    <div class="card" style="border-radius: 0px 0px 30px 30px; ">
                        <img src="https://imagen.research.google/main_gallery_images/a-brain-riding-a-rocketship.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $champion['name']; ?></h5>
                            <p class="card-text"><?php echo $champion['description']; ?></p>
                            <div class="d-flex jus justify-content-between aling-items-center">
                                <p><?php echo $champion['resource']; ?></p>
                                <p><?php echo $champion['role']; ?></p>
                            </div>
                            <div class="d-flex jus justify-content-between aling-items-center">
                                <p class="card-text"><i> <?php echo $champion['creator']; ?> </i></p>
                                <!-- en aqeust cas com estem logeats tenim dos buttons per poder editar i modificar els campions ja que nomes es mostren els qeu hem creat nosltres -->
                                <div>
                                    <a href="./Controlador/controladorEliminar.php?id=<?php echo $champion['id'] ?>&action=delete" class="btn btn-danger" onclick="return confirmarEliminacion()">
                                        <i class="bi bi-trash3-fill"></i>
                                    </a>
                                    <a href="./Controlador/controladorEditar.php?id=<?php echo $champion['id'] ?>" class="btn btn-warning">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- part per fer la paguinacio dels champs  -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if($pagina == 0): ?>
                    <li class="page-item"><a class="page-link disabled">Enrere</a></li>
                <?php elseif($pagina == 1): ?>
                    <li class="page-item"><a class="page-link disabled">Enrere</a></li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina - 1 ?>">Enrere</a></li>
                <?php endif; ?>


                <?php for($i = 1; $i <= $numeroPagines; $i++): ?>
                    <?php if ($pagina === $i): ?>
                        <li class='page-item disabled'><a class='page-link' href='?pagina=<?php echo $i ?>'><?php echo $i ?></a></li>
                    <?php else: ?>
                        <li class='page-item'><a class='page-link' href='?pagina=<?php echo $i ?>'><?php echo $i ?></a></li>
                    <?php endif ?>
                <?php endfor ?>

                <?php if($pagina == 0): ?>
                    <li class="page-item"><a class="page-link disabled">Següent</a></li>
                <?php elseif($pagina == $numeroPagines): ?>
                    <li class="page-item"><a class="page-link disabled">Següent</a></li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina + 1 ?>">Següent</a></li>
                <?php endif; ?>
            </ul>
        </nav> 

    <?php else: ?>
        <header>
        <div class="home">
            <a href="./index.php">Home</a>
        </div>
        <!-- Título centrado -->
        <div class="title">
            <h1>Inici d'usuaris i registre de sessions</h1>
        </div>
        <!-- Perfil desplegable a la derecha -->
        <div class="profile-dropdown">
            <button class="profile-btn">
                <img src="https://via.placeholder.com/40" alt="Icono Perfil" class="profile-icon">
                Perfil
            </button>
            <div class="dropdown-content">
                <a href="./Vista/login.php">Login</a>
                <a href="./Vista/signUp.php">Sign Up</a>
            </div>
        </div>
        </header>
        <h1 style="text-align: center; margin-top: 25px;"><strong>CAMPEONS</strong></h1>
        <div class="row row-cols-1 row-cols-md-4 g-5">
            <?php foreach ($campeons as $champion): ?>
                <div class="col">
                    <div class="card" style="border-radius: 0px 0px 30px 30px; ">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $champion['name']; ?></h5>
                            <p class="card-text"><?php echo $champion['description']; ?></p>
                            <div class="d-flex jus justify-content-between aling-items-center">
                                <p><?php echo $champion['resource']; ?></p>
                                <p><?php echo $champion['role']; ?></p>
                            </div>
                            <div class="d-flex jus justify-content-between aling-items-center">
                                <p class="card-text"><i> <?php echo $champion['creator']; ?> </i></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?> 
        </div>
            
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            <?php if($pagina == 0): ?>
                    <li class="page-item"><a class="page-link disabled">Enrere</a></li>
                <?php elseif($pagina == 1): ?>
                    <li class="page-item"><a class="page-link disabled">Enrere</a></li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina - 1 ?>">Enrere</a></li>
                <?php endif; ?>


                <?php for($i = 1; $i <= $numeroPagines; $i++): ?>
                    <?php if ($pagina === $i): ?>
                        <li class='page-item disabled'><a class='page-link' href='?pagina=<?php echo $i ?>'><?php echo $i ?></a></li>
                    <?php else: ?>
                        <li class='page-item'><a class='page-link' href='?pagina=<?php echo $i ?>'><?php echo $i ?></a></li>
                    <?php endif ?>
                <?php endfor ?>

                <?php if($pagina == 0): ?>
                    <li class="page-item"><a class="page-link disabled">Següent</a></li>
                <?php elseif($pagina == $numeroPagines): ?>
                    <li class="page-item"><a class="page-link disabled">Següent</a></li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina + 1 ?>">Següent</a></li>
                <?php endif; ?>
            </ul>
        </nav> 
    <?php endif ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>