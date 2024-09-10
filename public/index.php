<?php
// Gerekli sistem dosyalarını dahil eder
require '../system/Router.php';
require '../system/Middleware.php';
require '../system/DB.php';

// Router sınıfından bir instance oluşturur
$router = new Router();

// Route ekler (Örnek: /user/{id} için UserController@show methodunu çalıştır)
$router->add('/user/{id}', 'UserController@show');

// Gelen URI'yi alır ve route'a göre yönlendirir
$uri = $_SERVER['REQUEST_URI'];
echo $router->dispatch($uri); // Route'u çalıştırır ve sonucu ekrana basar
?>
