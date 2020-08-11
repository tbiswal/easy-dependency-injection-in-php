<?php

class Logger 
{
	public function log($message) {
		print("\nLogging message: $message");
	}
}

class UserProfile
{
	public function __construct() {
		$this->logger = new Logger();
	}

	public function createUser() {

		// Create User logic

		// Log message
		$this->logger->log("User created \n\n");
	}

	public function updateUser() {
		
		// Update User logic

		// Log message
		$this->logger->log("User updated \n\n");
	}

	public function deleteUser() {
		
		// Delete User logic

		// Log message
		$this->logger->log("User deleted \n\n");
	}
}

$userProfileObj = new UserProfile();
$userProfileObj->createUser();
$userProfileObj->updateUser();
$userProfileObj->deleteUser();