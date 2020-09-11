<?php

interface LoggerInterface
{
    public function log($message);
}

class Logger implements LoggerInterface
{
    public function log($message)
    {
        print("\nLogging message: $message");
    }
}

// MonoLogger Library
class MonoLogger implements LoggerInterface
{
    private $formatter;

    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    public function log($message)
    {
        $this->formatter->format($message);
    }
}

class Formatter
{
    public function format($message)
    {
        print("***Logging message with mono logger***: $message");
    }
}

class UserProfile
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function createUser()
    {
        // Create User logic

        // Log message
        $this->logger->log("User created \n\n");
    }

    public function updateUser()
    {
        // Update User logic

        // Log message
        $this->logger->log("User updated \n\n");
    }

    public function deleteUser()
    {
        // Delete User logic

        // Log message
        $this->logger->log("User deleted \n\n");
    }
}

$userProfileObj = new UserProfile(new MonoLogger(new Formatter()));
$userProfileObj->createUser();
$userProfileObj->updateUser();
$userProfileObj->deleteUser();
