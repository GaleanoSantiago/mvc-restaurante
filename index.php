<?php
// require_once 'config/config.php';

// // Obtener la URL y dividirla en segmentos
// $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'login/index';
// $url = filter_var($url, FILTER_SANITIZE_URL);
// $url = explode('/', $url);

// // Obtener el controlador, método y parámetros
// $controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'LoginController';
// $methodName = !empty($url[1]) ? $url[1] : 'index';
// $params = array_slice($url, 2);

// // Verificar si el controlador existe
// if (file_exists('controllers/' . $controllerName . '.php')) {
//     require_once 'controllers/' . $controllerName . '.php';
//     $controller = new $controllerName();

//     // Verificar si el método existe en el controlador
//     if (method_exists($controller, $methodName)) {
//         call_user_func_array([$controller, $methodName], $params);
//     } else {
//         // Método no encontrado
//         echo 'Método no encontrado';
//     }
// } else {
//     // Controlador no encontrado
//     echo 'Controlador no encontrado';
// }
header("Location: ./views/login/index.php");
exit(); 

