<?php
include __DIR__ . '/../Util/autoload.php';

#url rewriting /removing /ciamax/public from url
$uri = strtok(ltrim($_SERVER['REQUEST_URI'], '/'), '?');
$uri = explode('/',$uri);
array_shift($uri);
array_shift($uri);
$uri = implode('/', $uri);
$ciamaxWebsite = new \Ciamax\Ciamax;
$entryPoint = new \Util\EntryPoint($ciamaxWebsite);
$entryPoint->run($uri, $_SERVER['REQUEST_METHOD']);