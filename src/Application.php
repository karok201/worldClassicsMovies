<?php
namespace App;

use App\Exception\ApplicationException;
use App\Exception\HttpException;
use App\View\Renderable;
use App\View\View;
use Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->initialize();
    }
    private function initialize()
    {
        $capsule = new Capsule();
        $config = new Config();

        $capsule->addConnection($config->get('db'));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function run(string $url, string $method)
    {
        try {
            if (is_string($this->router->dispatch($url, $method))) {
                echo $this->router->dispatch($url, $method);
            } else {
                $this->router->dispatch($url, $method)->render();
            }
        } catch (ApplicationException $e) {
            $this->renderException($e);
        }
    }
    private function renderException(ApplicationException $e)
    {
        if ($e instanceof Renderable) {
            $e->render();
        } elseif ($e instanceof HttpException) {
            if ($e->getCode() !== 0) {
                $errorCode = $e->getCode();
            } else {
                $errorCode = 500;
            }
            (new View('errors/error', ['title' => 'Error', 'errorCode' => $errorCode, 'errorMessage' => $e->getMessage()]))->render();
        }
    }
}
