<?php

require __DIR__ . '/../../../vendor/autoload.php';
require_once(__DIR__ . '/EmployeeRepositoryInterface.php');
require_once(__DIR__ . '/EmployeeRepository.php');


use Illuminate\Container\Container;

/**
 * 
 */
class EmployeeController
{
    protected $employees;

    function __construct(EmployeeRepositoryInterface $employees)
    {
        $this->employees = $employees;
    }

    public function listEmployeeAction() {
        return $this->employees->employeeList();
    }
}

// $employeeController = new EmployeeController(new EmployeeRepository());
// print_r($employeeController->listEmployeeAction());

// $app = new Container();
// $app->bind('EmployeeRepositoryInterface', 'EmployeeRepository');
// $empObject =$app->make('EmployeeController');
// print_r($empObject->listEmployeeAction());