<?php

namespace Profiler;

use Profiler\Iterator\ProfilerElementCollection;
use Profiler\Iterator\ProfilerElementIterator;

class Profiler extends Config {

    private ProfilerElementCollection $collection;

    public function __construct() {
        $this->collection = new ProfilerElementCollection;
        $this->rec(self::SERVER_REQUEST_TIME);
    }

    public function rec(string $name): Profiler {
        $el = new ProfilerElement(microtime(true));
        return $this;
    }

    public function stop(string $name): Profiler {
        return $this;
    }

    public function dump(): ProfilerElementIterator {
        return new ProfilerElementIterator($this->collection);
    }

}