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
        $this->generator = new OpenSSLGenerator('private.pem', 'public.pem', 2048, 'RSA', 'foobar');
        $this->removeKeysIfExist();
    }
}
