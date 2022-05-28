<?php
namespace App;

use App\Exception\HttpException;
use Closure;
use JetBrains\PhpStorm\Pure;

class   Route
{
    private string $method;
    private string $path;
    private Closure $callback;

    #[Pure] public function __construct(string $method, string $path, array $callback)
    {
        $this->method   = $method;
        $this->path     = $path;
        $this->callback = $this->prepareCallback($callback);
    }

    private function prepareCallback(array $callback): Closure
    {
        return function (...$params) use ($callback) {
            list($class, $method) = $callback;
            return (new  $class)->{$method}(...$params);
        };
    }

    public function getPath(): string
    {
        return $this->path;
    }
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @throws HttpException
     */
    public function match(string $uri, string $method): bool
    {
        // @todo: добавьте сюда еще проверку http-метода запроса, на совпадение с http-методом текущего маршрута(DONE)
        if ($method === $this->method) {
            return preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath()) . '$/', $uri);
        } else {
            throw new HttpException('The transmission method does not match the route', 405);
        }
    }

    private function findParams($path, $page): ?array
    {
        $pathArr = explode('/', $path);
        $pageArr = explode('/', $page);

        for ($i = 0; $i < count($pageArr); $i++) {
            if ($pageArr[$i] === '*') {
                $result[] = $pathArr[$i];
            }
        }
        return $result ?? null;
    }

    public function run(string $uri)
    {
        if (strpos($this->path, '*')) {
            $params = $this->findParams($uri, $this->path);
        }

        if (isset($params)) {
            return call_user_func_array($this->callback, $params);
        } else {
            return call_user_func_array($this->callback, []);
        }
    }
}
