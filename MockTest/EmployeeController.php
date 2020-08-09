<?php
require __DIR__ . '/../vendor/autoload.php';
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
		$employeeList = $this->employees->employeeList();
		print_r($employeeList);
	}
}


$app = new Container();
$app->bind('EmployeeRepositoryInterface', 'EmployeeRepository');
$empObject =$app->make('EmployeeController');
$empObject->listEmployeeAction();