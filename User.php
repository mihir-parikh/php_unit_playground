<?php
class User {
    public $first_name;
    public $surname;
    
    public function getFullName() {
        return "$this->first_name $this->surname";
    }
}
