<?php

namespace Profiler\Iterator;

use Iterator;
use Profiler\Iterator\ProfilerElementCollection;

class ProfilerElementIterator implements Iterator {

    private ProfilerElementCollection $collection;
    private $position = 0;
    private $reverse = false;

    public function __construct(ProfilerElementCollection $collection, bool $reverse = false) {
        
        $this->collection = $collection;
        $this->reverse = $reverse;

    }

    public function current() {
        
    }

    public function next() {

    }

    public function key() {

    }

    public function valid() {

    }

    public function rewind() {

    }

}
