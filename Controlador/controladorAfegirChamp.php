<?php 
// Pau Muñoz Serra
require "../Model/modelEditarChampions.php";

$host = 'localhost'; // Servidor donde se aloja la base de datos
$dbname = 'pt04_pau_munoz'; // Nombre de la base de datos
$username = 'root'; // Usuario de la base de datos
$password = ''; // Contraseña de la base de datos


$error = "<br>"; // Error per guardar en cas de algun espai buit

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
    // Crear una nueva instancia de PDO
    $connexio = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configurar PDO per llençar uan exepcio en cas de error
    $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        // Mostrar error en cas de que falli la conexión
        die("Error en la conexión: " . $e->getMessage());
    }

    $nom = htmlspecialchars($_POST['nomCampio']);
    $descripcio = htmlspecialchars($_POST['descripcio']);
    $recurs = htmlspecialchars($_POST['resource']);
    $rol = htmlspecialchars($_POST['role']);

    // fem comprovacións de si esta tot be o no
    if(empty($nom)) {
        $error .= "Error no has ficat el NOM<br>";
    } 
    if (empty($descripcio)) {
        $error .= "Error no has ficat DESCRIPCIO<br>";
    } 
    if (empty($recurs)) {
        $error .= "Error no has ficat el RECURS<br>";
    } 
    if (empty($rol) || $rol === "-----") {
        $error .= "Error no has ficat el seu ROLE<br>";
    } 

    if($error === "<br>") {
        // obtenir el nostre NickName
        if(isset($_SESSION['usuari'])){ $nomUsuari = $_SESSION['usuari']; };
        // mirem que no estigui duplicat
        $champDuplicat = modelComprovarNom($connexio, $nom);

        if ($champDuplicat === "ChampNoDuplicat") {
            // afegim el nou campio
            $afegirChamp = modelAfegirCampio($connexio, $nom, $descripcio, $recurs, $rol, $nomUsuari);
            if($afegirChamp === "SiCreat") {
                // salta error si esta duplicat
                $error = "ChampCreat";
            }
        } else {
            $error = "Error el NOM del campio ja EXISTEIX<br>";
        }
        
       
    }
}


?>