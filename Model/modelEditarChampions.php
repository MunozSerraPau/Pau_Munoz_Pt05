<?php 
// Pau Muñoz Serra

// Afegeix un nou campio a la base de dades
function modelAfegirCampio(PDO $connexio, string $nom, string $descripcio, string $recurs, string $rol, string $nickname) {
    try {
        $sql = "INSERT INTO campeones (name, description, resource, role, creator) VALUES (:namee, :descriptionn, :resourcee, :rolee, :creatorr)";
        $statement = $connexio->prepare($sql);
        $statement->execute( 
            array(
            ':namee' => $nom, 
            ':descriptionn' => $descripcio,
            ':resourcee' => $recurs,
            ':rolee' => $rol,
            ':creatorr' => $nickname
            )
        );
        return "SiCreat";


    } catch(PDOException $e) {
        return "NoCreat";
    }

}


// Fem la comprovació de si el nom del campio ja existeix o no
function modelComprovarNom (PDO $connexio, string $nom) {
    try {
        $sql = "SELECT * FROM campeones WHERE name = :nomChamp";
            $statement = $connexio->prepare($sql);
            $statement->execute( 
                array(
                ':nomChamp' => $nom)
            );

            if ($statement->rowCount() > 0){
                return "ChampDuplicat";
            } else {
                return "ChampNoDuplicat";
            }
    } catch(PDOException $e) {
        return "ChampDuplicat";
    }
}


// Elimina un campio de la base de dades segons el seu ID
function modelEliminarCampion(PDO $connexio, string $id) {
    try {
        $sql = "DELETE FROM campeones WHERE id = :idChamp";
        $statement = $connexio->prepare($sql);
        $statement->execute( 
            array(
            ':idChamp' => $id
            )
        );

        return "ELIMINAT";
            
    } catch(PDOException $e) {
        return "NoELIMINAT";
    }
}


// Actualitxza un campió segons al seva ID amb parametres nous
function modelModificarCampion(PDO $connexio, string $nom, string $descripcio, string $recurs, string $rol, string $id) {
    try {
        $sql = "UPDATE campeones SET name = :namee, description = :descriptionn, resource = :resourcee, role = :rolee WHERE id = :id";
        $statement = $connexio->prepare($sql);
        $statement->execute( 
            array(
            ':namee' => $nom, 
            ':descriptionn' => $descripcio,
            ':resourcee' => $recurs,
            ':rolee' => $rol,
            ':id' => $id
            )
        );
        return "Actualitzat";


    } catch(PDOException $e) {
        return "NoActualitzat";
    }
}


// Comprovació de si el campio amb un nom contret l'ha afegir l'usuari que li passem
function modelComprovarUsuariId (PDO $connexio, string $nom, string $id) {
    try {
        $sql = "SELECT * FROM campeones WHERE id = :idChamp AND creator = :nomCreator";
            $statement = $connexio->prepare($sql);
            $statement->execute( 
                array(
                ':idChamp' => $id,
                ':nomCreator' => $nom
                
                )
            );

            if ($statement->rowCount() > 0){
                return "LaCreatEll";
            } else {
                return "NoLaCreatEll";
            }
    } catch(PDOException $e) {
        return "ErrorBD";
    }
}


// Obtenim totes les dades d'un campio segosn la seva id per poder-ho mostrar a l'hora de editar-lo per modificar-lo mes endavant
function modelObtenirDadesChamp (PDO $connexio, string $id) {
    try {
        $sql = "SELECT * FROM campeones WHERE id = :idChamp";
        $statement = $connexio->prepare($sql);
        $statement->execute( 
                array(
                ':idChamp' => $id               
                )
            );

        $champ = $statement->fetch();
        return $champ;

    } catch(PDOException $e) {
        return "ErrorBD";
    }
}

?>