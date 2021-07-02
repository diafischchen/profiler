<?php

namespace Profiler\Iterator;

use Profiler\ProfilerElement;

class ProfilerElementCollection {

    private $array = Array();

    public function __construct() {
        
    }

    public function push(string $name, ProfilerElement $element): ProfilerElementCollection {
        $this->array[$name] = $element;
        return $this;
    }

    public function get() {
        
    }

}