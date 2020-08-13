<?php

require_once(__DIR__ . '/EmployeeRepositoryInterface.php');

class EmployeeRepository implements EmployeeRepositoryInterface
{
	
    public function employeeList() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "employees";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT emp_no, first_name, last_name FROM employees LIMIT 3");
            $stmt->execute();

            // set the resulting array to associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $employeeList = $stmt->fetchAll();
            return $employeeList;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }
}