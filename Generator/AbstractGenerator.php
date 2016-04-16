<?php

/*
 * This file is part of the RCH package.
 *
 * (c) Robin Chalas <robin.chalas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RCH\Keygen\Generator;

/**
 * Abstract class that all generators should extend.
 *
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
abstract class AbstractGenerator implements GeneratorInterface
{
    /**
     * @var string
     */
    protected $privateKeyPath;

    /**
     * @var string
     */
    protected $publicKeyPath;

    /**
     * @var int
     */
    protected $privateKeyBits;

    /**
     * @var string
     */
    protected $passphrase;

    /**
     * Constructor.
     *
     * @param string $privateKeyPath
     * @param string $publicKeyPath
     * @param int    $privateKeyBits
     * @param string $privateKeyType
     * @param string $passphrase
     */
    public function __construct($privateKeyPath, $publicKeyPath, $privateKeyBits, $privateKeyType, $passphrase)
    {
        $this->privateKeyPath = $privateKeyPath;
        $this->publicKeyPath  = $publicKeyPath;
        $this->privateKeyBits = $privateKeyBits;
        $this->privateKeyType = $privateKeyType;
        $this->passphrase = $passphrase;
    }

    /**
     * @return string
     */
    public function getPrivateKeyPath()
    {
        return $this->privateKeyPath;
    }

    /**
     * @return string
     */
    public function getPublicKeyPath()
    {
        return $this->publicKeyPath;
    }
}
