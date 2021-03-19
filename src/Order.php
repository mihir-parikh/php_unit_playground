<?php
class Order {
    public $amount;
    protected $gateway;

    // Injecting the dependency in the constructor
    public function __construct($gateway) {
        $this->gateway = $gateway;
    }

    public function process() {
        return $this->gateway->charge($this->amount);
    }
}
?>