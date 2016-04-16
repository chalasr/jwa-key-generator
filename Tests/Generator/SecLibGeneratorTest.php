<?php

/*
 * This file is part of the RCH package.
 *
 * (c) Robin Chalas <robin.chalas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
        $this->generator = new SecLibGenerator('private.pem', 'public.pem', 2048, 'foobar');
        $this->removeKeysIfExist();
    }
}
