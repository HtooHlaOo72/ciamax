<?php
include __DIR__ . '/../Util/autoload.php';

$uri = strtok(ltrim($_SERVER['REQUEST_URI'], '/'), '?');

$ciamaxWebsite = new \Ciamax\Ciamax;
$entryPoint = new \Util\EntryPoint($ciamaxWebsite);
$entryPoint->run($uri, $_SERVER['REQUEST_METHOD']);