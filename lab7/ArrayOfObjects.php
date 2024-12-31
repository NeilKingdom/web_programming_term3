<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Lab7</title>
        <meta charset="utf-8"></meta>
        <link rel="stylesheet" href="StyleSheet.css"/>
    </head>
    <body>
        <header id="header">
            <?php include 'Header.php';?>
        </header>
        <nav id="menu">
            <?php include 'Menu.php';?>
        </nav>
        <div id="content">
            <?php
            include 'Employee.php';
            include 'Supervisor.php';

            $employee1 = new Employee(1, "Chris", "Rogers");
            $employee2 = new Employee(2, "Matt", "Prior");
            $employee3 = new Employee(3, "Cindy", "Burnskill");
            $employee4 = new Employee(4, "Elizabeth", "Ford");
            $employee5 = new Employee(5, "Doug", "May");
            $employee6 = new Employee(6, "John", "Hopkins");

            $employees1 = array($employee1, $employee2, $employee3);
            $employees2 = array($employee4, $employee5, $employee6);

            $supervisor1 = new Supervisor(7, "Adam", "Philip", $employees1);
            $supervisor2 = new Supervisor(8, "Nicolas", "Jones", $employees2);

            foreach($supervisor1->getEmployees() as $emp) 
                echo "Employee Id: " . $emp->getEmployeeId() . ", Name: " . $emp->getFirstName() . ", " . $emp->getLastName() 
                . ", Supervisor: " . $supervisor1->getFirstName() . " " . $supervisor1->getLastName() . "<br>";
            foreach($supervisor2->getEmployees() as $emp) 
                echo "Employee Id: " . $emp->getEmployeeId() . ", Name: " . $emp->getFirstName() . ", " . $emp->getLastName() 
                . ", Supervisor: " . $supervisor2->getFirstName() . " " . $supervisor2->getLastName() . "<br>";
            ?>
        </div>
        <footer id="footer">
            <?php include 'Footer.php';?>
        </footer>
    </body>
</html>