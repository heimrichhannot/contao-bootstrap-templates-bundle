<?php

/*
 * Copyright (c) 2020 Heimrich & Hannot GmbH
 *
 * @license LGPL-3.0-or-later
 */

namespace HeimrichHannot\TwigTemplatesBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Config\ConfigPluginInterface;
use HeimrichHannot\TwigTemplatesBundle\ContaoTwigTemplatesBundle;
use Symfony\Component\Config\Loader\LoaderInterface;

class Plugin implements BundlePluginInterface, ConfigPluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoTwigTemplatesBundle::class)->setLoadAfter([
                ContaoCoreBundle::class,
                "HeimrichHannot\TwigSupportBundle\HeimrichHannotTwigSupportBundle",
            ]),
        ];
    }

    /**
     * Allows a plugin to load container configuration.
     */
    public function registerContainerConfiguration(LoaderInterface $loader, array $managerConfig)
    {
        $loader->load('@ContaoTwigTemplatesBundle/Resources/config/listeners.yml');
        $loader->load('@ContaoTwigTemplatesBundle/Resources/config/services.yml');
        $loader->load('@ContaoTwigTemplatesBundle/Resources/config/datacontainers.yml');
        $loader->load('@ContaoTwigTemplatesBundle/Resources/config/frontend_frameworks.yml');
    }
}
