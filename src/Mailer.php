<?php

class Mailer {
    public function sendMail($email, $message) {
        sleep(3);
        echo "\n$message sent to $email\n";
        
        return true;
    }
}
