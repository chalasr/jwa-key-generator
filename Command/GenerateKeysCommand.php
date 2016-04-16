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
use Symfony\Component\DependencyInjection\ContainerInterface;
use RCH\Keygen\Generator\GeneratorInterface;

/**
 * GenerateKeysCommand.
 *
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
class GenerateKeysCommand extends Command
{
    public function __construct(GeneratorInterface $generator)
    {
        parent::__construct();

        $this->generator = $generator;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('generate')
            ->setDescription('Generate public/private keys');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->generator->export($this->generator->generate());
    }
}
