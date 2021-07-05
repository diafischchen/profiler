<?php

namespace Profiler;

use Profiler\Tmp\ProfilerTmpElement;

class ProfilerElement {

    private string $name;
    private float $startTime;
    private float $endTime;

    public function __construct(ProfilerTmpElement $el) {
        $this->name = $el->getName();
        $this->startTime = $el->getStartTime();
        $this->endTime = $el->getEndTime();
    }

    public function getName(): string {
        return $this->name;
    }

    public function getExecTime(): float {
        return $this->endTime - $this->startTime;
    }

    public function getStartTime(): float {
        return $this->startTime;
    }

    public function getEndTime(): float {
        return $this->endTime;
    }

}