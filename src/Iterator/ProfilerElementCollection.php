<?php

namespace Profiler\Iterator;

use Profiler\ProfilerElement;

class ProfilerElementCollection {

    private $array = Array();

    public function __construct() {
        
    }

    public function push(ProfilerElement $element) {
        array_push($this->array, $element);
    }

}