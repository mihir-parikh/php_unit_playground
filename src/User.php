<?php
class User {
    public $first_name;
    public $surname;
    public $email;
    // Dependency injection variable
    protected $mailer;
    
    // Dependency injection
    public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function getFullName() {
        return trim("$this->first_name $this->surname");
    }
    
    public function notify($message) {
        return $this->mailer->sendMail($this->email, $message);
    }
}
