<?php
session_start();

if(!isset($_SESSION['update']) || $_SESSION['update'] != true) {
    header('Location: Admin.php');
}

$host = "localhost";
$DB_username = "ujpqq52kmqujz";
$DB_password = "#ru+57d#@c_B";
$database = "dbrtd9wdgd38j2";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $DB_username, $DB_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*echo "Connected successfully" . "</br>";*/
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>Lab8</title>
        <meta charset="utf-8"></meta>
        <link rel="stylesheet" href="form_style.css"/>
    </head>
    <body>
        <header id="header">
            <?php include 'Header.php';?>
        </header>

        <nav id='menu'>
            <?php include 'Menu.php';?>
        </nav>

        <div id='content'>
                <?php
                $sqlquery = 'SELECT * FROM Employee WHERE AdminCode = 111 OR AdminCode = 999';
                $employee = $pdo->query($sqlquery);

                foreach($employee as $emp): 
                    $id = $emp[0];
                ?>
                    <form action="UpdateAccount.php" method="post">
                    <span style='margin-left: 20px;'>
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" value="Edit Employee">
                    </span>
                    <?php echo $emp[1]; ?>
                    <?php echo $emp[2] . "<br><br>"; ?>
                    </form>
                <?php endforeach; ?>
        </div>

        <footer id='footer'>
            <?php include 'Footer.php';?>
        </footer>
    </body>
</html>