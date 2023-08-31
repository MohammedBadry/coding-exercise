<?php
namespace Strategies\Import;

class ImportStrategyContext {

    private $strategy;

    //startegy is not instantiated at construct time
    public function __construct($strategy) {
        $this->strategy =$strategy;
    }
    public function import() {
        return $this->strategy->import();
    }
}
