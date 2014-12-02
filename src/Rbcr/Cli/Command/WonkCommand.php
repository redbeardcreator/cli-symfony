<?php

namespace Rbcr\Cli\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;

class WonkCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('wonk')
            ->setDescription('Operate the Wonkanator')
            ->addOption(
                'spiral',
                null,
                InputOption::VALUE_NONE,
                'Use the spiral control'
                )
            ->addOption(
                'wave',
                null,
                InputOption::VALUE_NONE,
                'Use the wave control'
                )
            ;
    }

    protected function execute (InputInterface $input, OutputInterface $output)
    {
        $controls = array();
        if ($input->getOption('spiral')) {
            $controls[] = 'spiral';
        }
        if ($input->getOption('wave')) {
            $controls[] = 'wave';
        }

        $text = '<info>Operating the Wonkanator<info>';
        if (!empty($controls)) {
            $ctrlStyle = 'fg=black;bg=yellow';
            $startControl = "<$ctrlStyle>[";
            $endControl = "]</$ctrlStyle> ";

            $text .= ' ' . $startControl .
                implode($endControl . $startControl, $controls) . $endControl;
        }
        $output->writeln($text);

        $ct = 100;
        $progress = new ProgressBar($output, $ct);
        $progress->start();
        for ($i = 0; $i < $ct; $i++) {
            usleep(50000);
            $progress->advance();
        }
        $progress->finish();
        $output->writeln('');
        $output->writeln('<comment>Wonkanator finished</comment>');
    }
}