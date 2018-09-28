<?php
declare(strict_types=1);

namespace Enm\Bundle\JsonApi\Mapper\DependencyInjection\Compiler;

use Enm\JsonApi\Mapper\ObjectResourceMapper;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
class ResourceMapperPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     * @throws \Exception
     */
    public function process(ContainerBuilder $container): void
    {
        if ($container->hasDefinition(ObjectResourceMapper::class)) {
            $registry = $container->getDefinition(ObjectResourceMapper::class);
            $mappers = $container->findTaggedServiceIds('json_api.resource_mapper');
            foreach ($mappers as $id => $tags) {
                $registry->addMethodCall('addResourceMapper', [new Reference($id)]);
            }
        }
    }
}
