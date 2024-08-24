<?php

namespace LukaszZaroda\TwigHintsBundle\Tests\Functional;

use LukaszZaroda\TwigHints\Twig\HintsExtension;
use LukaszZaroda\TwigHintsBundle\TwigHintsBundle;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Twig\Environment;

#[CoversClass(TwigHintsBundle::class)]
class ExtensionTest extends KernelTestCase
{
    public function testExtensionIsAService(): void
    {
        $container = $this->getContainer();
        $this->assertTrue($container->has('twig_hints.twig.hints_extension'));
    }

    public function testExtensionIsAddedToTwig(): void
    {
        $container = $this->getContainer();
        /** @var Environment $twig */
        $twig = $container->get('twig');
        $this->assertTrue($twig->hasExtension(HintsExtension::class));
    }
}
