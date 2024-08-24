<?php

namespace LukaszZaroda\TwigHintsBundle;

use LukaszZaroda\TwigHints\Twig\HintsExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class TwigHintsBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $hintsExtensionDefinition = new Definition(HintsExtension::class);
        $hintsExtensionDefinition->addTag('twig.extension');
        $builder->setDefinition('twig_hints.twig.hints_extension', $hintsExtensionDefinition);
    }
}
