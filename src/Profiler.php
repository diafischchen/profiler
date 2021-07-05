<?php

namespace Profiler;

use Profiler\Iterator\ProfilerElementCollection;
use Profiler\Iterator\ProfilerElementIterator;
use Profiler\Tmp\ProfilerTmpElement;
use Profiler\Tmp\ProfilerTmpElementCollection;


class Profiler extends Config {

    private ProfilerElementCollection $collection;
    private ProfilerTmpElementCollection $tmp;

    public function __construct() {
        $this->collection = new ProfilerElementCollection;
        $this->tmp = new ProfilerTmpElementCollection;
        $this->rec(self::SERVER_REQUEST_TIME);
    }

    public function rec(string $name): Profiler {
        if ($name === self::SERVER_REQUEST_TIME) {
            $el = new ProfilerTmpElement('SERVER_REQUEST_TIME', $_SERVER['REQUEST_TIME_FLOAT']);
        } else {
            $el = new ProfilerTmpElement($name, microtime(true));
        }

        $this->tmp->push($name, $el);

        return $this;
    }

    public function stop(string $name): Profiler | false {
        $tmp = $this->tmp->get($name);

        if ($tmp !== false) {
            $tmp->setEndTime(microtime(true));
            $this->addElement($tmp);
            return $this;
        } else {
            return false;
        }
    }

    public function dump(bool $reverse = false): ProfilerElementIterator {
        return new ProfilerElementIterator($this->collection, $reverse);
    }

    private function addElement(ProfilerTmpElement $tmp) {
        $el = new ProfilerElement($tmp);
        $this->collection->push($el);
    }

}