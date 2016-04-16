<?php

/*
 * This file is part of the RCH package.
 *
 * (c) Robin Chalas <robin.chalas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RCH\Keygen\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * GenerateKeysCommand.
 *
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
class GenerateKeysCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('generate')
            ->setDescription('Generate keys for JWA encryption/decryption')
            ->addOption('dest-path', null, InputOption::VALUE_OPTIONAL, 'The directory where in the keys will be generated')
            ->addOption('encryption-engine', null, InputOption::VALUE_REQUIRED, 'The encryption engine (openssl or phpseclib)')
            ->addOption('encryption-algorithm', null, InputOption::VALUE_OPTIONAL, 'The encryption algorithm');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}
