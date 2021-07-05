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

        return $this->collection->get($this->position);

    }

    public function next() {

        if ($this->reverse) {
            $this->position--;
        } else {
            $this->position++;
        }

    }

    public function key() {

        return $this->position;

    }

    public function valid() {

        return $this->collection->valid($this->position);

    }

    public function rewind() {

        if ($this->reverse) {
            $this->position = $this->collection->count() - 1;
        } else {
            $this->position = 0;
        }
        
    }

}
