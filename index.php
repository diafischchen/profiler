<?php

use Profiler\Profiler;

require 'autoload.php';


$profiler = new Profiler;

print_r($profiler);

$profiler->rec('all')->rec('firstSection');

// some code

$profiler->stop('firstSection')->rec('secondSection');

// section code

$profiler->stop('section');
$profiler->stop('all');
$profiler->stop(Profiler::SERVER_REQUEST_TIME);

$times = $profiler->dump();

foreach($times as $time) {
    echo $time->getName();
    echo $time->getTime();
}
