<?php

namespace RCH\Keygen\DependencyInjection;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

/**
 * Keygen container extension.
 *
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
class RCHKeygenExtension extends Extension
{
    /**
     * Loads and creates services definition from default arguments.
     *
     * @param ContainerBuilder $container
     */
    public function load(array $configs = null, ContainerBuilder $container)
    {
        $outputDir = __DIR__.'/../generated';

        $container->setParameter('rch.keygen.private_key_path', $outputDir.'/private.pem');
        $container->setParameter('rch.keygen.public_key_path', $outputDir.'/public.pem');
        $container->setParameter('rch.keygen.private_key_bits', 2048);
        $container->setParameter('private_key_type', 'DSA'); // Useless for seclib
        $container->setParameter('rch.keygen.passphrase', 'foobar');
        $container->setParameter('rch.keygen.encryption_engine', 'openssl');

        // OpenSSL Generator
        $container
            ->register('rch.keygen.generator.openssl', 'RCH\Keygen\Generator\OpenSSLGenerator')
            ->addArgument('%rch.keygen.private_key_path%')
            ->addArgument('%rch.keygen.public_key_path%')
            ->addArgument('%rch.keygen.private_key_bits%')
            ->addArgument('%private_key_type%')
            ->addArgument('%rch.keygen.passphrase%');

        // PhpSecLib Generator
        $container
            ->register('rch.keygen.generator.seclib', 'RCH\Keygen\Generator\SecLibGenerator')
            ->addArgument('%rch.keygen.private_key_path%')
            ->addArgument('%rch.keygen.public_key_path%')
            ->addArgument('%rch.keygen.private_key_bits%')
            ->addArgument('%rch.keygen.passphrase%');

        $encryptionEngine = $container->getParameter('rch.keygen.encryption_engine');

        if (!in_array($encryptionEngine, ['openssl', 'seclib'])) {
            throw new \InvalidArgumentException(
                sprintf('The encryption engine "%s" is not supported. Please use one of the available ("openssl" or "seclib")', $encryptionEngine)
            );
        }

        // Generator alias corresponding to the chosen encryption engine.
        $container->setAlias('rch.keygen.generator', 'rch.keygen.generator.'.$encryptionEngine);

        // Keys generation command
        $container
            ->register('rch.keygen.command.generate_keys', 'RCH\Keygen\Command\GenerateKeysCommand')
            ->addArgument(new Reference('rch.keygen.generator'));
    }
}
