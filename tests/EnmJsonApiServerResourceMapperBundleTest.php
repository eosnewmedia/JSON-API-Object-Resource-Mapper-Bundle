<?php
declare(strict_types=1);

namespace Enm\Bundle\JsonApi\Mapper\Tests;

use Enm\Bundle\JsonApi\Mapper\DependencyInjection\EnmJsonApiServerResourceMapperExtension;
use Enm\Bundle\JsonApi\Mapper\EnmJsonApiMapperBundle;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
class EnmJsonApiServerResourceMapperBundleTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testServices(): void
    {
        $container = new ContainerBuilder();

        (new EnmJsonApiMapperBundle())->build($container);
        (new EnmJsonApiServerResourceMapperExtension())->load([], $container);

        try {
            $container->compile();
            $this->assertTrue(true);
        } catch (\Exception $e) {
            $this->fail($e->getMessage());
        }
    }
}
