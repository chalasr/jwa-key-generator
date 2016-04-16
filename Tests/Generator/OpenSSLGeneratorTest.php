<?php

namespace RCH\Keygen\Tests\Generator;

use RCH\Keygen\Generator\OpenSSLGenerator;

/**
 * Tests the OpenSSLGenerator.
 *
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
class OpenSSLGeneratorTest extends BaseTestGenerator
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->generator = new OpenSSLGenerator('private.pem', 'public.pem', 'foobar');
    }
}
