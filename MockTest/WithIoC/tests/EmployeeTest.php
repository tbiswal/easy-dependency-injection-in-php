<?php 
declare(strict_types=1);
require __DIR__ . '/../../../vendor/autoload.php';
require_once(__DIR__ . '/../Employee/EmployeeRepositoryInterface.php');
require_once(__DIR__ . '/../Employee/EmployeeController.php');

use PHPUnit\Framework\TestCase;
use Illuminate\Container\Container;

class EmployeeTest extends TestCase
{
    /**
     * Test Employee List Using mock
     */
    public function testEmployeeList() {
        $emplList = array(
            0 => array (
                'emp_no' => 10001,
                'first_name' => 'Georgi',
                'last_name' => 'Facello'
            )
        );

        $employeeListMock = \Mockery::mock('EmployeeRepositoryInterface');
        $employeeListMock->shouldReceive('employeeList')->once()->andReturn($emplList);

        $app = new Container();
        $employeeController = $app->instance('EmployeeRepositoryInterface', $employeeListMock);;

        $this->assertNotEquals(array(), $employeeController->employeeList());
        $this->assertEquals($emplList, $employeeController->employeeList());
    }
}

// dip tanmayabiswal$ ./vendor/bin/phpunit MockTest/tests/
