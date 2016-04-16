<?php

namespace RCH\Keygen\Tests\Generator;

/**
 * OpenSSLKeyLoaderTest
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

        $this->assertFileExists('private.pem');
        $this->assertFileExists('public.pem');
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        $privateKey = 'private.pem';
        $publicKey  = 'public.pem';

        if (file_exists($publicKey)) {
            unlink($publicKey);
        }

        if (file_exists($privateKey)) {
            unlink($privateKey);
        }
    }
}
