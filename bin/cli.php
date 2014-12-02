#!/usr/bin/env php
<?php

$loader = require '../vendor/autoload.php';
$loader->add('', '../src');

use Rbcr\Cli\Command as CliCmd;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new CliCmd\TestCommand);
$application->add(new CliCmd\WonkCommand);
$application->run();
