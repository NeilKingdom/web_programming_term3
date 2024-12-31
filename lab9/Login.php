<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['login'] != true) {
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
$refreshed = false;
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
            <!--FORM INFO-->
            <div class='left'>
                <form action="Login.php" method="post">

                    <h3>Create your new account</h3>

                    <div class='section_c'>
                        Email<br><input type='email' name='email'><br>
                        Password<br><input type='text' name='pass'><br>
                    </div>

                    <?php
                    if(isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['pass']) && $_POST['pass'] != "") {

                        $useremail = $_POST['email'];
                        $pass = $_POST['pass'];

                        $sqlquery = 'SELECT COUNT(*) FROM Employee WHERE EmailAddress = "' . $useremail . '" AND Password = "' . $pass . '"';
                        $rownum = $pdo->query($sqlquery)->fetchColumn();

                        if($rownum > 0) {
                            $_SESSION["view"] = true;
                            //Redirect to view employees page
                            echo'<script> location.replace("ViewAllEmployees.php"); </script>';
                        }
                        $refreshed = true;
                    }
                    else if($refreshed)
                        echo "Could not validate user";
                    ?>

                    <span style='margin-left: 20px;'>
                        <input value="Login" type="submit">
                    </span>
                </form>
            </div>
        </div>

        <footer id='footer'>
            <?php include 'Footer.php';?>
        </footer>
    </body>
</html>
