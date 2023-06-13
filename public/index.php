<?php
// Inclusion de composer (!important)
require __DIR__.'/../vendor/autoload.php';

// Inclusion des classes
require __DIR__.'/../app/Controllers/CoreController.php';
require __DIR__.'/../app/Controllers/MainController.php';
require __DIR__.'/../app/Models/CoreModel.php';
require __DIR__.'/../app/Models/Character.php';
require __DIR__.'/../app/Models/Type.php';
require __DIR__.'/../app/Utils/Database.php';

// Instanciation d'Altorouter
$router = new AltoRouter();


// Définition du basepath (partie fixe de l'url)
$router->setBasePath($_SERVER['BASE_URI']);


// Lister les routes de notre site 
$router->map(
    'GET',  // la méthode HTTP qui est autorisée
    '/',    // L'url à laquel cette route réagit
    [       // 'target': tableau qui stocke le nom du controller & de la méthode associés à la route
        'controller' => 'MainController',
        'method' => 'home'
    ],
    'home'  // Le nom de la route (unique, arbitraire et optionnelle, mais très utile !).
);


$router->map(
    'GET',  
    '/creators',   
    [       
        'controller' => 'MainController',
        'method' => 'creators'
    ],
    'creators'  
);

// Début du dispatcher: mise en place du matching
// Ici je demande à AltoRouter si il y a une correspondance entre mon url
// et toutes les routes que je lui ai déclarée via ->map
$match = $router->match();

// Si une route correspond à l'url courante :
if ($match) {


    // On récupère le controller qui sera utilisé
    $controllerToUse = $match['target']['controller'];
    // Et la méthode qui sera exécutée
    $methodToCall = $match['target']['method'];
    // Ainsi que les potentiels paramètres dynamiques de la page
    $arguments = $match['params'];
    
} else {
    // Je définis ces valeurs pour aller sur la page 404
    $controllerToUse = 'MainController';
    $methodToCall = 'page404';
    $arguments = [];
}


// J'instancie le controller
// PHP va remplacer la variable $controllerToUse par sa valeur
// puis va instancier la bonne classe "new MainController()" par exemple
$controller = new $controllerToUse();
// J'appelle la méthode correspondant à la route
// PHP va remplacer la variable $methodToCall par sa valeur
// puis va appeler la bonne méthode "->home()" par exemple
// On passe en argument le tableau des paramètres dynamiques de la route matchée
$controller->$methodToCall($match['params']);