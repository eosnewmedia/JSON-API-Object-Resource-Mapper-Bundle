<?php
declare(strict_types=1);

namespace Enm\Bundle\JsonApi\Mapper\DependencyInjection;

use Enm\JsonApi\Mapper\ObjectMapperInterface;
use Enm\JsonApi\Mapper\ObjectResourceMapper;
use Enm\JsonApi\Mapper\ResourceMapperInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
class EnmJsonApiServerResourceMapperExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @param array $configs An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $container->autowire(ObjectResourceMapper::class)->setPublic(false);
        $container->setAlias(ObjectMapperInterface::class, ObjectResourceMapper::class)->setPublic(false);
        $container->setAlias(ResourceMapperInterface::class, ObjectResourceMapper::class)->setPublic(false);
    }
}
