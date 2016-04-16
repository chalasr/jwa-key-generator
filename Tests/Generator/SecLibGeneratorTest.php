<?php

namespace RCH\Keygen\Tests\Generator;

use RCH\Keygen\Generator\SecLibGenerator;

/**
 * Tests the SecLibGenerator.
 *
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
class SecLibGeneratorTest extends BaseTestGenerator
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->generator = new SecLibGenerator('private.pem', 'public.pem', 'foobar');
    }
}
