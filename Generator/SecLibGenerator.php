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
     * {@inheritdoc}
     */
    public function generate()
    {
        $rsa = new RSA();
        $rsa->setPassword($this->passphrase);

        extract($rsa->createKey(4096));

        return [
            'private' => $privatekey,
            'public'  => $publickey,
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @throws \RuntimeException If an error occurs
     */
    public function export(array $keys)
    {
        try {
            file_put_contents($this->publicKeyPath, $keys['public']);
            file_put_contents($this->privateKeyPath, $keys['private']);
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage());
        }
    }
}
