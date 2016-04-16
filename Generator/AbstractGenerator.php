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
    protected $publicKeyPath;

    /**
     * @var string
     */
    protected $privateKeyPath;

    /**
     * @var string
     */
    protected $passphrase;

    /**
     * Constructor.
     *
     * @param string $privateKeyPath
     * @param string $publicKeyPath
     * @param string $passphrase
     */
    public function __construct($privateKeyPath, $publicKeyPath, $passphrase)
    {
        $this->privateKeyPath = $privateKeyPath;
        $this->publicKeyPath  = $publicKeyPath;
        $this->passphrase = $passphrase;
    }
}
