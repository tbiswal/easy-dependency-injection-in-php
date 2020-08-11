<?php

class Logger 
{
	public function log($message) {
		print("\nLogging message: $message");
	}
}

// MonoLogger Library
class MonoLogger 
{
	public function log($message) {
		print("\nLogging message with mono logger: $message");
	}
}

class UserProfile
{
	private $logger;

	public function __construct(MonoLogger $logger) {
		$this->logger = $logger;
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

$userProfileObj = new UserProfile(new MonoLogger());
$userProfileObj->createUser();
$userProfileObj->updateUser();
$userProfileObj->deleteUser();