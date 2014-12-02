<?php

namespace Rbcr\Cli\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('test')
            ->setDescription('Test the stystem out...or something')
            ->addArgument(
                'which',
                InputArgument::OPTIONAL,
                'What thing do you want to test?'
                )
            ->addOption(
                'fast',
                null,
                InputOption::VALUE_NONE,
                'If set, only test fast'
                );
    }

    protected function execute (InputInterface $input, OutputInterface $output)
    {
        $which = $input->getArgument('which');
        if ($which) {
            $text = 'Testing ' . $which;
        } else {
            $text = 'Testing';
        }

        if ($input->getOption('fast')) {
            $text .= ' FAST!!!!';
        }
        $output->writeln($text);
    }
}