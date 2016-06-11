<?php

namespace NatocTo\FootballData\DI;

use Nette;
use NatocTo;
use Exception;

class FootballDataExtension extends Nette\DI\CompilerExtension
{
    public $defaults = [
        'authToken' => ''
    ];

    public function loadConfiguration()
    {
        $config = $this->getConfig($this->defaults);

        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('content'))
                ->setClass(NatocTo\FootballData\Content::class, [$config['authToken']]);

        $builder->addDefinition($this->prefix('default'))
                ->setClass(NatocTo\FootballData\FootballData::class, [$this->prefix('@content')]);
    }
}