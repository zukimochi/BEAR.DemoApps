<?php

namespace Demo\Sandbox\Provide\Router\Adapter;

use BEAR\Package\Provide\Router\Adapter\AdapterInterface;
use BEAR\Package\Provide\Router\Adapter\RouterCollection;
use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;
use Ray\Di\ProviderInterface;

class RouterCollectionProvider implements ProviderInterface
{
    /**
     * @var \BEAR\Package\Provide\Router\Adapter\AdapterInterface
     */
    private $auraRouter;

    /**
     * @var \BEAR\Package\Provide\Router\Adapter\AdapterInterface
     */
    private $webRouter;

    /**
     * @param AdapterInterface $auraRouter
     * @param AdapterInterface $webRouter
     *
     * @Inject
     * @Named("auraRouter=aura_router,webRouter=web_router")
     */
    public function __construct(AdapterInterface $auraRouter, AdapterInterface $webRouter)
    {
        $this->auraRouter = $auraRouter;
        $this->webRouter = $webRouter;
    }

    /**
     * @return RouterCollection
     */
    public function get()
    {
        $routers =  [$this->auraRouter, $this->webRouter];
        $routerCollection = new RouterCollection($routers);

        return $routerCollection;
    }
}
