<?php
class Router {
    private $routes = [];

    // Yeni bir route eklemek için bu method kullanılır
    public function add($route, $controller) {
        $this->routes[$route] = $controller;
    }

    // URI'yi alıp tanımlanmış route'larla eşleştirir
    public function dispatch($uri) {
        foreach ($this->routes as $route => $controller) {
            // Route yapısında bulunan parametreleri regex'e çevirir
            $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $route);
            // URI regex ile eşleşiyorsa controller'ı çağır
            if (preg_match("#^$pattern$#", $uri, $matches)) {
                return $this->invokeController($controller, $matches);
            }
        }
        // Eğer route bulunamazsa 404 hatası döner
        return "404 Not Found";
    }

    // Controller'ı çağırır ve parametreleri controller'a iletir
    private function invokeController($controller, $params) {
        // Controller ve method bilgisini ayırır
        list($controllerName, $method) = explode('@', $controller);
        // Controller sınıfını oluşturur
        $controllerInstance = new $controllerName();
        // Controller'ın ilgili methodunu parametrelerle çalıştırır
        return call_user_func_array([$controllerInstance, $method], $params);
    }
}
?>
