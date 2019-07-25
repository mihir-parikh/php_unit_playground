<?php

class Mailer {
    public function sendMail($email, $message) {
        if(empty($email)) {
            throw new Exception();
        }
        
        sleep(3);
        echo "\n$message sent to $email\n";
        
        return true;
    }
}
