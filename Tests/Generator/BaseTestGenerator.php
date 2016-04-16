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

/**
 * OpenSSLKeyLoaderTest.
 *
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
class BaseTestGenerator extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \RCH\Keygen\Generator\GeneratorInterface
     */
    protected $generator;
    
    /**
     * Test OpenSSLKeyGeneator::generate().
     */
    public function testGenerate()
    {
        $keys = $this->generator->generate();

        $this->assertTrue(is_array($keys));
        $this->assertArrayHasKey('public', $keys);
        $this->assertArrayHasKey('private', $keys);
    }

    /**
     * Test OpenSSLKeyGeneator::export().
     */
    public function testExport()
    {
        $keys = $this->generator->generate();
        $this->generator->export($keys);

        $this->assertFileExists($this->generator->getPrivateKeyPath());
        $this->assertFileExists($this->generator->getPublicKeyPath());
    }

    /**
     */
    protected function removeKeysIfExist()
    {
        $privateKey = $this->generator->getPrivateKeyPath();
        $publicKey  = $this->generator->getPublicKeyPath();

        if (file_exists($publicKey)) {
            unlink($publicKey);
        }

        if (file_exists($privateKey)) {
            unlink($privateKey);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        $this->removeKeysIfExist();
    }
}
