<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Intro to PHP</title>
        <meta charset="utf-8">
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
            $firstName = "Neil";
            $middleName = "Thomas";
            $lastName = "Kingdom";
            define("STUDENT_NUM", "040967309");

            $greeting = "Hello World!!";
            $append = "This is the first time I am using php!!";
            echo "<h3>$firstName <br>$middleName <br>$lastName <br>" . STUDENT_NUM . "</h3>";
            echo "<h4>" . $greeting . " " . $append . "</h4>";
            ?>
            <img src="/assets/images/php.png" alt="PHP 7"/>
        </div>
        <footer id="footer">
            <?php include 'Footer.php';?>
        </footer>
    </body>
</html>
