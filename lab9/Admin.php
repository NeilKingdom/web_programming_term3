<?php
session_start();

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
                <form action="Admin.php" method="post">

                    <h3>Admin Panel</h3>

                    <div class='section_c'>
                        Email Address<br><input type='email' name='email'><br>
                        Password<br><input type='text' name='pass'><br>
                        Admin Code<br><input type='text' name='adcode'><br>
                    </div>

                    <?php
                    if(isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['pass']) && $_POST['pass'] != "" && isset($_POST['adcode']) && $_POST['adcode'] != "") {

                        $useremail = $_POST['email'];
                        $pass = $_POST['pass'];
                        $adcode = $_POST['adcode'];

                        $sqlquery = 'SELECT COUNT(*) FROM Employee WHERE EmailAddress = "' . $useremail . '" AND Password = "' . $pass . '"';
                        $rownum = $pdo->query($sqlquery)->fetchColumn();

                        //Check for matching email, password, and admin code
                        if($rownum > 0 && $adcode == 999) {
                            $_SESSION["update"] = true;
                            //Redirect to Select Account
                            echo'<script> location.replace("SelectAccount.php"); </script>';
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
