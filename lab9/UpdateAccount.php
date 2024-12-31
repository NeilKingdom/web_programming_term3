<?php
session_start();

if(!isset($_SESSION['update']) || $_SESSION['update'] != true) {
    header('Location: Admin.php');
}

//Connect to Database
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
                <form action="UpdateAccount.php" method="post">

                <?php
                    if(isset($_POST['fname1']) && $_POST['fname1'] != "" &&
                    isset($_POST['lname1']) && $_POST['lname1'] != "" &&
                    isset($_POST['email1']) && $_POST['email1'] != "" &&
                    isset($_POST['pnumber1']) && $_POST['pnumber1'] != "" &&
                    isset($_POST['sin1']) && $_POST['sin1'] != "" &&
                    isset($_POST['pass1']) && $_POST['pass1'] != "" &&
                    isset($_POST['designation1']) && $_POST['designation1'] != "" &&
                    isset($_POST['adcode1']) && $_POST['adcode1'] != "" &&
                    isset($_POST['id']) && $_POST['id'] != "") {

                        $fname = $_POST['fname1'];
                        $lname = $_POST['lname1'];
                        $email = $_POST['email1'];
                        $pnumber = $_POST['pnumber1'];
                        $sin = $_POST['sin1'];
                        $pass = $_POST['pass1'];
                        $designation = $_POST['designation1'];
                        $adcode = $_POST['adcode1'];
                        $id = $_POST['id'];

                        $sqlquery = 'UPDATE Employee SET FirstName="' . $fname . '", LastName="' . $lname . '", EmailAddress="'
                        . $email . '", TelephoneNumber=' . $pnumber . ', SocialInsuranceNumber=' . $sin . ', Password="' . $pass
                        . '", Designation="' . $designation . '", AdminCode=' . $adcode . ' WHERE EmployeeId=' . $id;
                        $result = $pdo->query($sqlquery);
                        echo "Successfully updated employee " . $fname . " " . $lname;
                        $refreshed = true;
                    }
                    else if($refreshed)
                        echo "One or more fields could not be processed. Please ensure all form fields are correct.<br>";
                    ?>

                    <h3>Update your account</h3>

                    <div class='section_c'>
                        First Name<br><input type='text' name='fname1'><br>
                        Last Name<br><input type='text' name='lname1'><br>
                        Email<br><input type='email' name='email1'><br>
                        Phone Number<br><input type='number' name='pnumber1'><br>
                        SIN<br><input type='number' name='sin1'><br>
                        Password<br><input type='text' name='pass1'><br>
                        Designation<br><input type='text' name='designation1'><br>
                        Admin Code<br><input type='number' name='adcode1'><br>
                    </div>

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
