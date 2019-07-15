<?php

class Queue {
    protected $items = array();
    
    public function push($item) {
        $this->items[] = $item;
    }
    
    public function pop() {
        return array_shift($this->items);
    }
    
    public function getCount() {
        return count($this->items);
    }
}
