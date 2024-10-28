<?php
// Pau Muñoz Serra
require "../Model/modelEditarChampions.php";


$host = 'localhost'; // Servidor donde se aloja la base de datos
$dbname = 'pt04_pau_munoz'; // Nombre de la base de datos
$username = 'root'; // Usuario de la base de datos
$password = ''; // Contraseña de la base de datos


$error; // Error per guardar en cas de algun espai buit

  
try {
// Crear una nueva instancia de PDO
$connexio = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

// Configurar PDO per llençar uan exepcio en cas de error
$connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Mostrar error en cas de que falli la conexión
    die("Error en la conexión: " . $e->getMessage());
}


// Verifiquem que s'ha rebut l'id per POST i es per recollir les dades i modificar el campio
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['updateChamp'])) {
        // guardem les dades
        $id = trim(htmlspecialchars($_GET['id']));
        $name = htmlspecialchars($_POST['nomCampio']);
        $description = htmlspecialchars($_POST['descripcio']);
        $recurce = htmlspecialchars($_POST['resource']);
        $role = htmlspecialchars($_POST['role']);

        // modifiquem el campio i el redirigim al index unaltre cop
        modelModificarCampion($connexio, $name, $description, $recurce, $role, $id);
        header("Location: ../index.php");
        
    }
    // Aquí es per redirigirnos a la vista per editar el camp amb get
} elseif (isset($_GET['id'])) { 
    // guardem le id
    $id = trim(htmlspecialchars($_GET['id']));

    // guardem el campio per poder obtenir les dades mes endavant i poderlas imprimir
    $champ = modelObtenirDadesChamp($connexio, $id);

    
    if (!empty($champ)) {
        // sino esta buit l'enviem a la vista per editar-ho
        include "../Vista/update.vista.php";
    } else {
        // sino tornem al index
        echo "<script>alert('No s\'ha trobat el registre');</script>";
        header("Location: ../index.php");
    }

} else {
    header("Location: ../index.php");

}

?>
