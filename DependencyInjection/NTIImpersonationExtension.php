<?php

namespace NTI\ImpersonationBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class NTIImpersonationExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter( 'nti_impersonation.redirect_route', $config["redirect_route"]);
        $container->setParameter( 'nti_impersonation.user_class', $config["user_class"]);
        $container->setParameter( 'nti_impersonation.user_class_property', $config["user_class_property"]);
        $container->setParameter( 'nti_impersonation.firewall', $config["firewall"]);

    }
}
