<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../Style/login.css">
    <title>INSERT</title>
</head>
<body>
    <?php include_once "../Controlador/controladorUsuaris.php" ?>

    <!-- Mirem si estem logeats i obtenim el nom del Usari amb el que estem -->
    <?php if(isset($_SESSION['usuari'])): $nomUsuari = $_SESSION['usuari'] ?>
        <?php include "../Controlador/controladorAfegirChamp.php" ?>

        <!-- Son els svg que faix servir per mostrar el error o el missatge de correcte  -->
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
            <symbol id="info-fill" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>

        <header>
            <!-- Enlace a la izquierda para "Home" -->
            <div class="home">
                <a href="../index.php">Home</a>
            </div>

            <!-- Título centrado -->
            <div class="title">
                <h1>Afegir Champion</h1>
            </div>

            <!-- Perfil desplegable a la derecha -->
            <div class="profile-dropdown">
                <button class="profile-btn">
                    <img src="https://via.placeholder.com/40" alt="Icono Perfil" class="profile-icon">
                    <?php echo $nomUsuari ?>
                </button>
            </div>
        </header>
        <h1 style="text-align: center; margin-top: 25px;"><strong>AFEGIR</strong></h1>


        <!-- Formulario de inicio de sesión -->
        <div class="login-form-container">
            <form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>, method="POST" class="row g-3 login-form">
                <div class="col-12">
                    <label for="nomCampio" class="form-label">Nom del Champion</label>
                    <input type="text" class="form-control" name="nomCampio" value="<?php if (isset($_POST['nomCampio'])) { echo $_POST['nomCampio']; }  // Aixo fa que si li doenm a enviar encar es mantengin les dades ?>">
                </div>
                <div class="col-12">
                    <label for="descripcio" class="form-label ">Descripcio</label>
                    <textarea type="text" class="form-control" name="descripcio"><?php if (isset($_POST['descripcio'])) { echo $_POST['descripcio']; } ?></textarea>
                </div>


                <div class="col-md-6">
                    <label for="resource" class="form-label">Recurs of Champion</label>
                    <input type="text" class="form-control" name="resource" value="<?php if (isset($_POST['resource'])) { echo $_POST['resource']; } ?>">
                </div>
                <div class="col-md-6">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" class="form-select">
                        <option value="" selected>-----</option>
                        <option value="Marksman">Marksman</option>
                        <option value="Fighter">Fighter</option>
                        <option value="Tank">Tank</option>
                        <option value="Mage">Mage</option>
                        <option value="Assassin">Assassin</option>
                        <option value="Controller">Controller</option>
                        <option value="Specialist">Specialist</option>
                    </select>
                </div>

                <!-- Ens mostra els errors o un missatge de correcte segons el que ens passin per error -->
                <?php if (isset($error)):   // Comprova si la variable "error" existeix ?> 
                    <?php if (!empty($error) && $error != "ChampCreat" && $error != "<br>"):     // Si hi ha un error que no sigui "Confirmat" entra ?>
                        <div class="alert alert-danger d-flex align-items-center justify-content-evenly" role="alert">
                            <svg class="bi flex-shrink-0 me-2" style="width: 50px; height: auto;" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg> 
                            <div>
                                <p><?php echo $error    // Mostra l'error que hi ha ?></p>
                            </div>
                        </div>
                    <?php elseif ($error == "ChampCreat"):   // Si l'error és "Confirmat"
                        header('Location: ../index.php');
                    endif ?>
                <?php endif ?>

                <div class="col-12">
                    
                    <button type="submit" class="btn btn-primary" name="insert">Crear Champion</button>
                </div>
            </form>
        </div>
    <?php else: ?>
    <!-- Si no estem logeats en redirigeix al index -->

        <?php header('Location: ../index.php'); ?>
    <?php endif ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
