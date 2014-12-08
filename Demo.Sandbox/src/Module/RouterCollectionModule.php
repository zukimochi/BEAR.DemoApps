<?php

namespace Demo\Sandbox\Module;

use Ray\Di\AbstractModule;

class RouterCollectionModule extends AbstractModule
{
    protected function configure()
    {
        $this->bind('BEAR\Sunday\Extension\Router\RouterInterface')
            ->to('BEAR\Package\Provide\Router\Router');
        $this->bind('BEAR\Package\Provide\Router\Adapter\AdapterInterface')
            ->toProvider('Demo\Sandbox\Provide\Router\Adapter\RouterCollectionProvider');
    }
}
