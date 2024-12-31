<?php
session_start();

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
                <form action="CreateAccount.php" method="post">

                <h3>Create your account</h3>

                    <div class='section_c'>
                        First Name<br><input type='text' name='fname'><br>
                        Last Name<br><input type='text' name='lname'><br>
                        Email<br><input type='email' name='email'><br>
                        Phone Number<br><input type='number' name='pnumber'><br>
                        SIN<br><input type='number' name='sin'><br>
                        Password<br><input type='text' name='pass'><br>
                        Designation<br><input type='text' name='designation'><br>
                        Admin Code<br><input type='number' name='adcode'><br>
                    </div>

                    <?php
                    if(isset($_POST['fname']) && $_POST['fname'] != "" &&
                    isset($_POST['lname']) && $_POST['lname'] != "" &&
                    isset($_POST['email']) && $_POST['email'] != "" &&
                    isset($_POST['pnumber']) && $_POST['pnumber'] != "" &&
                    isset($_POST['sin']) && $_POST['sin'] != "" &&
                    isset($_POST['pass']) && $_POST['pass'] != "" &&
                    isset($_POST['designation']) && $_POST['designation'] != "" &&
                    isset($_POST['adcode']) && $_POST['adcode'] != "") {

                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $email = $_POST['email'];
                        $pnumber = $_POST['pnumber'];
                        $sin = $_POST['sin'];
                        $pass = $_POST['pass'];
                        $designation = $_POST['designation'];
                        $adcode = $_POST['adcode'];

                        $sqlquery = 'INSERT INTO Employee(FirstName, LastName, EmailAddress, TelephoneNumber, SocialInsuranceNumber, Password, Designation, AdminCode)'
                        . 'VALUES("' . $fname . '", "' . $lname . '", "' . $email . '", ' . $pnumber . ', ' . $sin . ', "' . $pass . '", "' . $designation . '", "' . $adcode . '")';
                        $result = $pdo->query($sqlquery);

                        $refreshed = true;
                    }
                    else if($refreshed)
                        echo "One or more fields could not be processed. Please ensure all form fields are correct.<br>";
                    ?>

                    <span style='margin-left: 20px;'>
                        <input value="Submit Information" type="submit">
                    </span>
                </form>
        </div>

        <footer id='footer'>
            <?php include 'Footer.php';?>
        </footer>
    </body>
</html>
