<?php
class Middleware {
    private $middlewares = [];

    // Belirtilen URI için bir middleware ekler
    public function add($uri, $middleware) {
        $this->middlewares[$uri] = $middleware;
    }

    // URI'ye göre ilgili middleware'i çalıştırır
    public function handle($uri) {
        if (isset($this->middlewares[$uri])) {
            // Middleware sınıfını oluşturur ve çalıştırır
            $middlewareClass = $this->middlewares[$uri];
            $middlewareInstance = new $middlewareClass();
            $middlewareInstance->handle();
        }
    }
}
?>
