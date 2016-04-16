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

use phpseclib\Crypt\RSA;

/**
 * Generate SSH keys for SecLib.
 *
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
class SecLibGenerator extends AbstractGenerator
{

    /**
     * Constructor.
     *
     * @param string $privateKeyPath
     * @param string $publicKeyPath
     * @param string $privateKeyBits
     * @param string $passphrase
     */
    public function __construct($privateKeyPath, $publicKeyPath, $privateKeyBits, $passphrase)
    {
        parent::__construct($privateKeyPath, $publicKeyPath, $privateKeyBits, 'RSA', $passphrase);
    }

    /**
     * {@inheritdoc}
     */
    public function generate()
    {
        $rsa = new RSA();
        $rsa->setPassword($this->passphrase);

        extract($rsa->createKey($this->privateKeyBits));

        return [
            'private' => $privatekey,
            'public'  => $publickey,
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @throws \RuntimeException If the output directory is not writable
     */
    public function export(array $keys)
    {
        $directory = dirname($this->publicKeyPath);

        if (!is_writable($directory)) {
            throw new \RuntimeException(sprintf('The directory "%s" doesn\'t exist or is not writable', $directory));
        }

        file_put_contents($this->publicKeyPath, $keys['public']);
        file_put_contents($this->privateKeyPath, $keys['private']);
    }
}
