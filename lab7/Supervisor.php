<?php
class Supervisor extends Employee {

    private $employees;

    function __construct($employeeId, $firstName, $lastName, $employees) {
        parent::__construct($employeeId, $firstName, $lastName);
        $this->setEmployees($employees);
    }
    public function getEmployees() {
        return $this->employees;
    }
    public function setEmployees($employees) {
        $this->employees = $employees;
    }
}
?>