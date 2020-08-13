<?php 
declare(strict_types=1);
require __DIR__ . '/../../../vendor/autoload.php';
require_once(__DIR__ . '/../Employee/EmployeeRepositoryInterface.php');
require_once(__DIR__ . '/../Employee/EmployeeController.php');

use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * Test Employee List Using mock
     */
    public function testEmployeeList() {
        $emplList = array(
           array (
                'emp_no' => 10001,
                'first_name' => 'Georgi',
                'last_name' => 'Facello'
            ),
            array (
                'emp_no' => 10002,
                'first_name' => 'Bezalel',
                'last_name' => 'Simmel'
            ),
            array (
                'emp_no' => 10003,
                'first_name' => 'Bezalel',
                'last_name' => 'Simmel'
            )
        );

        $employeeListMock = \Mockery::mock('EmployeeRepositoryInterface');
        $employeeListMock->shouldReceive('employeeList')->once()->andReturn($emplList);

        $employeeController = new EmployeeController($employeeListMock);

        $this->assertNotEquals(array(), $employeeController->listEmployeeAction());
        $this->assertEquals($emplList, $employeeController->listEmployeeAction());
    }
}

// dip tanmayabiswal$ ./vendor/bin/phpunit MockTest/WithDI/tests/
