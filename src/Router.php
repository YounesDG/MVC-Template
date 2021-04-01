<?php

namespace DGRSDT_CANDIDAT;

use AltoRouter;
use DGRSDT\Security\ForbiddenException;

class Router
{

    /**
     * @var string
     */
    private $viewPath;

    /**
     * @var AltoRouter
     */
    private $router;

    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
    }

    public function get(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('GET', $url, $view, $name);

        return $this;
    }

    public function post(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('POST', $url, $view, $name);

        return $this;
    }

    public function match(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('POST|GET', $url, $view, $name);

        return $this;
    }

    public function url(string $name, array $params = [])
    {
        return $this->router->generate($name, $params);
    }


    public function run(): self
    {

        $router = $this;
        $layout = 'layouts/default';
        $match = $this->router->match();

        if (is_array($match)) {

            $view = $match['target'] ?: '404';
            $params = $match['params'];

            //layouts
            $isAdmin = strpos($view, 'admin/') !== false;




            if ($layout = $isAdmin) {
                $layout = 'admin/layouts/default';
            } else {
                $layout = 'layouts/default';
            }

            try {
                ob_start();
                require $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
                $content = ob_get_clean();
                require $this->viewPath . DIRECTORY_SEPARATOR . $layout . '.php';
            } catch (ForbiddenException $e) {
                header('Location: ' . $this->url('Home'));
                exit();
            }
        } else {
            header('Location: ' . $this->url('Home'));
        }
        return $this;
    }


}