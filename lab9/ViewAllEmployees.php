<?php
session_start();

if(!isset($_SESSION["view"]) || $_SESSION["view"] != true) {
    header('Location: CreateAccount.php');
}

$host = "localhost";
$username = "ujpqq52kmqujz";
$password = "#ru+57d#@c_B";
$database = "dbrtd9wdgd38j2";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*echo "Connected successfully" . "</br>";*/
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>Lab8</title>
        <meta charset="utf-8"></meta>
        <link rel="stylesheet" href="StyleSheet.css"/>
    </head>
    <body>
        <header id="header">
            <?php include 'Header.php';?>
        </header>

        <nav id='menu'>
            <?php include 'Menu.php';?>
        </nav>

        <div id='content'>
            <table>
                <tr>
                    <td><h5>FirstName</h5></td>
                    <td><h5>LastName</h5></td>
                    <td><h5>Email Address</h5></td>
                    <td><h5>Phone Number</h5></td>
                    <td><h5>SIN</h5></td>
                    <td><h5>Designation</h5></td>
                </tr>

                <?php
                $sqlquery = "SELECT * FROM Employee";
                $temp = $pdo->query($sqlquery);

                $rownum = $temp->rowCount();

                $employees = array();
                for($i = 0; $i < $rownum; $i++) {
                    $emp = $temp->fetch();
                    array_push($employees, $emp);
                }
                ?>

                <?php foreach($employees as $emp): ?>
                <tr>
                    <td><?php echo $emp[1]; ?></td>
                    <td><?php echo $emp[2]; ?></td>
                    <td><?php echo $emp[3]; ?></td>
                    <td><?php echo $emp[4]; ?></td>
                    <td><?php echo $emp[5]; ?></td>
                    <td><?php echo $emp[7]; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <footer id='footer'>
            <?php include 'Footer.php';?>
        </footer>
    </body>
</html>
