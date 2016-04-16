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
 * Interface that all Generator must implement.
 */
interface GeneratorInterface
{
    /**
     * Generate a public/private key pair.
     *
     * @return array An array containing the key pair ready to export.
     */
    public function generate();

    /**
     * Export a public/private key pair previously generated.
     *
     * @param array $keys
     */
    public function export(array $keys);
}
