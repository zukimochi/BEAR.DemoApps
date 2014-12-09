<?php

namespace Demo\Sandbox\Provide\Router\Adapter;

use Aura\Router\Router;
use BEAR\Package\Provide\Router\Adapter\AuraRouter;
use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;
use Ray\Di\ProviderInterface;

class AuraRouterProvider implements ProviderInterface
{
    /**
     * @var \Aura\Router\Router
     */
    private $router;

    /**
     * @param Router $router
     *
     * @Inject
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @return AuraRouter
     */
    public function get()
    {
        $this->addHelloRoutes();
        $auraRouter = new AuraRouter($this->router);

        return $auraRouter;
    }

    /**
     * @return void
     */
    public function addHelloRoutes()
    {
        $this->router->add(null, '/hello/world/{name}')
            ->addTokens(['name' => '[a-zA-Z]+'])
            ->addValues(['path' => '/hello/world']);
    }
}
