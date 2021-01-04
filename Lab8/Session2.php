<?php
session_start();

if(isset($_POST['fname'])) 
    $_SESSION['fname'] = $_POST['fname'];
if(isset($_POST['lname'])) 
    $_SESSION['lname'] = $_POST['lname'];
if(isset($_POST['pnumber'])) 
    $_SESSION['pnumber'] = $_POST['pnumber'];
if(isset($_POST['email'])) 
    $_SESSION['email'] = $_POST['email'];
if(isset($_POST['bday'])) 
    $_SESSION['bday'] = $_POST['bday'];
if(isset($_POST['profession'])) 
    $_SESSION['profession'] = $_POST['profession'];
if(isset($_POST['sport'])) 
    $_SESSION['sport'] = $_POST['sport'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Lab8</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="form_style.css">
    </head>
    <body onbeforeunload="return reset_vars()">
        <header id="header">
            <?php include "Header.php";?>
        </header>

        <nav id="menu">
            <?php include "Menu.php";?>
        </nav>

        <div id="content">
            <div class="left section_c">
                <h1>User Profile</h1>
                <?php
			    if(isset($_POST['fname'])) 
                    echo "First name: " . $_SESSION['fname'] . "<br>";
                if(isset($_POST['lname'])) 
                    echo "Last name: " . $_SESSION['lname'] . "<br>";
                if(isset($_POST['pnumber'])) 
                    echo "Phone number: " . $_SESSION['pnumber'] . "<br>";
                if(isset($_POST['email'])) 
                    echo "Email: " . $_SESSION['email'] . "<br>";
                if(isset($_POST['bday'])) 
                    echo "Date of Birth: " . $_SESSION['bday'] . "<br>";
                if(isset($_POST['profession'])) 
                    echo "Profession: " . $_SESSION['profession'] . "<br>";
                if(isset($_POST['sport'])) 
                    echo "Favorite sport: " . $_SESSION['sport'] . "<br>";

                //Reset for future use
                session_unset();
		        ?>
            </div>
        </div>

        <footer id="footer">
            <?php include "Footer.php";?>
        </footer>
    </body>
</html>