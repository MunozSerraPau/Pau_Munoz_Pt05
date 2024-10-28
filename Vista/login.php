<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Style/login.css">
    <title>LOGIN</title>
</head>
<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>


    <?php include "../Controlador/controladorUsuaris.php" ?>


    <header>
        <!-- Enlace a la izquierda para "Home" -->
        <div class="home">
            <a href="../index.php">Home</a>
        </div>

        <!-- Título centrado -->
        <div class="title">
            <h1>Inici de Sessions</h1>
        </div>

        <!-- Perfil desplegable a la derecha -->
        <div class="profile-dropdown">
            <button class="profile-btn">
                <img src="https://via.placeholder.com/40" alt="Icono Perfil" class="profile-icon">
                Perfil
            </button>
        </div>
    </header>

    <!-- Formulario de inicio de sesión -->
    <div class="login-form-container">
        <form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>, method="POST" class="login-form">
            <h2>Iniciar sesión</h2>
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" value="<?php if (isset($_POST['username'])) { echo $_POST['username']; } ?>">
            </div>

            <!-- en aquest cas mi guardo la contrasenya estiguin igulas o no han de posar-la de nou per tema seguretat -->
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password">
            </div>
            <label>
                <input type="checkbox" name="recuerdame"> Recuérdame
            </label>

            <!-- No esta implementada -->
            <p class="form-footer">Has oblidat la contrasenya? <a href="#">Recuperar</a></p> <br>

            <?php if (isset($error)):   // Comprova si la variable "error" existeix ?> 
                <?php if (!empty($error) && $error != "UsuariConnectat"):     // Si hi ha un error que no sigui "Confirmat" entra ?>
                    <div class="alert alert-danger d-flex align-items-center justify-content-evenly" role="alert">
                        <svg class="bi flex-shrink-0 me-2" style="width: 50px; height: auto;" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg> 
                        <div>
                            <p><?php echo $error    // Mostra l'error que hi ha ?></p>
                        </div>
                    </div>
                <?php elseif ($error == "UsuariConnectat"):   // Si l'error és "Confirmat"
                    header('Location: ../index.php');
                endif ?>
            <?php endif ?>

            <div class="form-group">
                <button type="submit" class="btn-submit" name="login">Iniciar sesión</button>
            </div>
            <p class="form-footer">No tens un compte? <a href="./signUp.php">Regístrate</a></p>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
