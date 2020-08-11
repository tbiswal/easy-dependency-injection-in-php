<?php

class Logger 
{
    public function log($message) {
        print("\nLogging message: $message");
    }
}

class UserProfile
{
    public function createUser() {
        // Create User logic

        // Log message
        $logger = new Logger();
        $logger->log("User created \n\n");
    }

    public function updateUser() {
        // Update User logic

        // Log message
        $logger = new Logger();
        $logger->log("User updated \n\n");
    }

    public function deleteUser() {
        // Delete User logic

        // Log message
        $logger = new Logger();
        $logger->log("User deleted \n\n");
    }
}

$userProfileObj = new UserProfile();

$userProfileObj->createUser();
$userProfileObj->updateUser();
$userProfileObj->deleteUser();