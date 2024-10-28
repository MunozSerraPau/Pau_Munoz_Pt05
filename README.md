# Inici-usuaris-i-registre-de-sessions

## Objectiu

- En obrir el web sortiran tots els articles de forma pública sense excepció i sense opció d’inserir, editar o eliminar articles.
- A la mateixa pàgina principal trobarem una opció per a logar-se o enregistrar-se.
- Crear un formulari de inici de sessió i registre d’usuaris en una base de dades i posteriorment verificar quan inicien sessió els usuaris de la base de dades i llavors permetre’ls editar el contingut (els post de la paginació) si no iniciem sessió (usuari anònim) permetrem només veure els articles. Mireu com ho faríeu tenint en compte que el tractament de les dades que hi ha a la paginació no serà el mateix si ens validem que si no estem validats.
- S’haurà de comprovar si l’usuari ja existeix en qualsevol dels dos casos (inici sessió o registrar-se) i validar la contrasenya demanant-la dues vegades (registrar-se).
- S'ha de tenir en compte la fortalessa de la contrasenya, a més aquesta s'haurà de guardar encriptada.
- Si l’usuari comet un error a l’hora d’enregistrar-se, s’hauran de mantenir les dades al formulari actual.
- Una vegada validat, s’ha de mantenir la sessió de l’usuari almenys 40min activa.
- Cal treballar amb sessions i cookies. Valoreu en quins casos cal treballar amb sessions i quan amb cookies

# Projecte: PAU_MUNOZ_PT04

Aquest projecte és una aplicació web estructurada en amb MVC (Model-Vista-Controlador) utilitzant PHP. L'objectiu del projecte és gestionar usuaris i en el meu cas he escollir campions del lol, incloent-hi funcionalitats de registre, inici de sessió, edició i eliminació de registres (campions).

## Estructura del Projecte

### 1. Controlador
La carpeta `Controlador` conté els fitxers que gestionen la lògica de l'aplicació i fent de intermediari entre el model i la vista.

- **controladorAfegirChamp.php**: Controlador per afegir nous campions.
- **controladorEditar.php**: Controlador per editar la informació de campions.
- **controladorEliminar.php**: Controlador per eliminar campions i comprovar que el id del camp l'hagi creat l'Usuari amb el que estem logeats.
- **controladorLogOut.php**: Controlador per tancar la sessió de l'usuari.
- **controladorUsuaris.php**: Controlador per gestionar tot el tema d'usuari, com el registrese, l'inici de sessió i el canvi de contrasenya. En cada un comprovem tots els camp que no estiguin buits i qeu compleixin alguns requisits que hem ficat (la contrasenya).

### 2. Model
La carpeta `Model` conté els fitxers que tenen la interacció amb la base de dades.

- **modelChampions.php**: Model per gestionar tot el que es el tema de la paginació de quins champs he de guardar quin es el total que hi han.
- **modelEditarChampions.php**: Model per poder afegir un campio, eliminar-lo, actualitzar-lo i fer diverses comprovacións per mirar si l'Usuari amb el que estem la creat ell o no...
- **modelUsuaris.php**: Model per gestionar les dades dels usuaris, com el registre, l'autenticació i el poder canviar la contrasenya (encriptada).

### 3. Vista
La carpeta `Vista` conté les plantilles de visualització que renderitzen la interfície d'usuari.

- **afegir.vista.php**: Vista per a la pàgina d'afegir campions amb al que s'omplen les dades del champ que crear nou.
- **canviarContrasenya.vista.php**: Vista per canviar la contrasenya de l'usuari amb un formulari.
- **index.vista.php**: Vista principal de l'aplicació, amb la qual si estem logeats ens mostra d'una manera amb la que podem editar i eliminar els campions que ha creat l'Usuari i nomes ens mostren els camps que ha creat, sino el mostren tots els altres sense importar de qui sigui, no obtyant no podra ni editar ni eliminar cap. En aqeust arxiu hi ha un petit script per fer la confirmació a l'hora de eliminar un campio, per no eliminar-ho directament.
- **login.php**: Vista per a la pàgina d'inici de sessió.
- **signUp.php**: Vista per a la pàgina de registre.
- **update.vista.php**: Vista per actualitzar la informació de campions amb la qual es mostrar la informació actualq ue hi ha i nosltres podrem editarla per poder modificar aquell champ.

### 4. Style
La carpeta `Style` conté els fitxers CSS per a l'aplicació.

- **index.css**: Estils generals per a la pàgina principal.
- **login.css**: Estils per la majoria de paguines que tenen formulari (login, editar campio...).
- **signUp.css**: Estils específics per a la pàgina de registre d'usuaris.

### 5. Base de Dades
- **pt04_pau_munoz.sql**: Fitxer SQL que conté l'estructura i les dades de la base de dades necessària per a l'aplicació amb dos usuaris i 30 registres.

### 6. Altres Fitxers
- **index.php**: Fitxer principal que serveix com a punt d'entrada per a l'aplicació i la qual et redirigeix a la index.vista la qual et mostrar una cosa o unalte en funcuió del parametre session.

## Funcionalitats

- **Registre d'Usuaris**: Els usuaris es poden registrar a la plataforma i iniciar seccio quan vulguin.
- **Inici de Sessió**: Els usuaris poden iniciar sessió i accedir a la plataforma, poden editar els seus registres i eliminar-los.
- **Canvi de Contrasenya**: Els usuaris poden actualitzar la seva contrasenya sempre que sigui segura.
- **Tancar Sessió**: Els usuaris poden tancar sessió de manera segura i seguir navegant.

## SESSION

En el meu cas he fet servir les seccion per poder mostrar els campions d'Un usuari concret i si no que es mostresin tots, a més de poder obtenir el Nickname en cualsevol moment i poder-lo utilitzar.
